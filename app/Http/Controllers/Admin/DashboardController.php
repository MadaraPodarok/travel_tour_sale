<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TravelPackage;
use Illuminate\Http\Request;
use App\Transaction;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [
            'travel_package' => TravelPackage::query()->count(),
            'total_transaction' => Transaction::query()->count(),
            'transaction_pending' => Transaction::query()->where('transaction_status', 1)->count(),
            'transaction_success' => Transaction::query()->where('transaction_status', 2)->count(),
        ]);
    }
}
