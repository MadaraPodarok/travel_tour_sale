<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Transaction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $items = Transaction::with([
            'details', 'travel_package', 'user'
        ])->get();

        return view('pages.admin.transaction.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TransactionRequest $request
     * @return RedirectResponse
     */
    public function store(TransactionRequest $request): RedirectResponse
    {

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Преобразуем `transaction_status` из строки в целое число
        $data['transaction_status'] = Transaction::STATUS_MAP[$request->transaction_status] ?? null;


        Transaction::create($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $item = Transaction::with([
            'details', 'travel_package', 'user'
        ])->findOrFail($id);

        return view('pages.admin.transaction.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TransactionRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TransactionRequest $request, int $id): RedirectResponse
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = Transaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }
}
