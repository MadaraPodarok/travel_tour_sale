<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Отображение формы редактирования
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {

        $item = User::findOrFail($id);

        return view('pages.edit', [
            'item' => $item
        ]);
    }

    public function update(UpdateProfileRequest $request, $id): RedirectResponse
    {
        $data = $request->all();

        $item = User::findOrFail($id);

        $item->update($data);
        if (request()->hasFile('avatar')) {
            $avatar = request()->file('avatar')->getClientOriginalName();
            $this->deleteOldAvatar();
            request()->file('avatar')->storeAs('avatars', $item->id . '/' . $avatar, 'public');
            $item->update(['avatar' => $avatar]);
        }

        return redirect()->route('user-dashboard');
    }

    protected function deleteOldAvatar(): void
    {
        if (auth()->user()->avatar) {
            Storage::delete('avatars', auth()->user()->id . '/' . auth()->user()->avatar);
        }
    }
}
