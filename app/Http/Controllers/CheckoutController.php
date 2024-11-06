<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;

use Carbon\Carbon;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details','travel_package','user'])->findOrFail($id);
        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id): RedirectResponse
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->name,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)

        ]);

        return redirect()->Route('checkout',$transaction->id);
    }

    public function create(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|exists:users,name',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        if($request->is_visa)
        {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id);

    }

    public function remove(Request $request, $detail_id): RedirectResponse
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details','travel_package'])
            ->findOrFail($item->transaction_id);

        if($item->is_visa)
        {
            $transaction->transaction_total -= 190;
            $transaction->additional_cisa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|Factory|View
     */
    public function success(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('pages.success');
    }
}
