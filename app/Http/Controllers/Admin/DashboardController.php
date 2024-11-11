<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TravelPackage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Статистика
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $transQuery = Transaction::query();
        return view('pages.admin.dashboard', [
            'travel_package' => TravelPackage::query()->count(),
            'total_transaction' => $transQuery->count(),
            'transaction_pending' => $transQuery->where('transaction_status', 1)->count(),
            'transaction_success' => $transQuery->where('transaction_status', 2)->count(),
        ]);
    }
}
