<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Transaction;
use App\User;
use Illuminate\View\View;


class UserDashboardController extends Controller
{
    /**
     * Список ваших заказов
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $id = Auth::user()->id;
        $avatar = Auth::user()->avatar;
        $items = Transaction::with(['details', 'travel_package', 'user'])
            ->where('users_id', $id)
            ->orderBy('id')
            ->get()
            ->each(function ($item) {
                $item->transaction_status_text = $item->status_text;
            });

        $details = User::where('id', $id)->first();

        return view('pages.dashboard', [
            'dashboard_list' => $items,
            'id' => $id,
            'avatars' => $avatar,
            'details' => $details,
        ]);
    }

    /**
     * Данные заказа
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $item = Transaction::with([
            'details', 'travel_package', 'user'
        ])->findOrFail($id);

        return view('pages.detailorder', [
            'item' => $item
        ]);
    }
}
