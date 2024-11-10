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
    /**
     * Список платежей
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function index(Request $request, int $id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->orderBy('id')->findOrFail($id);
        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    /**
     * Обработка платежа
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function process(Request $request, int $id): RedirectResponse
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
            'username' => Auth::user()->username,
            'is_visa' => Auth::user()->is_visa,
            'passport' => Auth::user()->passport

        ]);

        return redirect()->route('checkout-process', $transaction->id);
    }

    /**
     * Создание платежа - Кнопка Добавить
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function create(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'passport' => 'required|string'
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        if ($request->is_visa) {
            $transaction->transaction_total += 4500; # Общая сумма тура
            $transaction->additional_visa += 4500; # Цена визы
        }

        $transaction->transaction_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout-list', $id);

    }

    /**
     * Удалить платеж
     * @param Request $request
     * @param int $detail_id
     * @return RedirectResponse
     */
    public function remove(Request $request, int $detail_id): RedirectResponse
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'travel_package'])
            ->findOrFail($item->transaction_id);

        if ($item->is_visa) {
            $transaction->transaction_total -= 4500;
            $transaction->additional_visa -= 4500;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout-list', $item->transaction_id);
    }

    /**
     * Обработка успешного платежа
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View
     */
    public function success(Request $request, int $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('pages.success');
    }
}
