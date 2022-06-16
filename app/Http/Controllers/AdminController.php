<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeUserColor;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function Symfony\Component\String\u;

class AdminController extends Controller
{

    /**
     * displays all the users
     *
     * @return View
     */
    public function dashboard(): View
    {
        $users = User::all();

        return view('dashboard', compact('users'));
    }

    public function changeColor(User $user) {
        return view('color', [
            'userToChange' => $user
        ]);
    }

    public function changeUserColor(ChangeUserColor $request, User $user) {
        if ($request->validated()) {
            $user->update(['color' => $request->get('color')]);
        }

        return redirect()->route('dashboard');
    }
}
