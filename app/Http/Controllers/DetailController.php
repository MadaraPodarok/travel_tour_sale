<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\TravelPackage;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Туры
 */
class DetailController extends Controller
{

    /**
     * Список туров
     * @return Application|Factory|View
     */
    public function index(): View
    {
        $items = TravelPackage::orderBy('id', 'asc')->paginate(6); // 6 туров на странице
//         Преобразуем каждый элемент, обрезая поле "about" до 40 символов
//        foreach ($items as $item) {
//            $item->about = Str::limit($item->about, 40); // Добавляем обрезанный текст в новое поле
//        }
        return view('pages.detail.index', compact('items'));
    }

    /**
     * Просмотр тура
     * @param Request $request
     * @param $slug
     * @return Application|Factory|View
     */
    public function show(Request $request, $slug)
    {
        $item = TravelPackage::with(['galleries'])
            ->where('slug',$slug)
            ->firstOrFail();
        return view('pages.detail.show',[
            'item'=> $item
        ]);
    }
}
