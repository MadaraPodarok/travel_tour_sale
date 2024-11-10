<?php

namespace App\Http\Controllers;
use App\TravelPackage;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = TravelPackage::with(['galleries'])->orderBy('id')->paginate(3);
        return view('pages.home',[
            'items' => $items
        ]);
    }
}
