<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use App\TravelPackage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $items = TravelPackage::all();

        return view('pages.admin.travel-package.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TravelPackageRequest $request
     * @return RedirectResponse
     */
    public function store(TravelPackageRequest $request): RedirectResponse
    {
        $data = $request -> all();
        $data['slug'] = Str::slug($request->title);

        TravelPackage::create($data);

        return redirect()->route('travel-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $item = TravelPackage::findOrFail($id);

        return view('pages.admin.travel-package.edit',[
            'item'=> $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TravelPackageRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TravelPackageRequest $request, int $id)
    {
        $data = $request -> all();
        $data['slug'] = Str::slug($request->title);

        $item=TravelPackage::findOrFail($id);

        $item->update($data);

        return redirect()->route('travel-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $item = TravelPackage::findOrFail($id);
        $item->delete();

        return redirect()->route('travel-package.index');
    }
}
