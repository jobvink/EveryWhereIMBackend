<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeUserColor;
use App\Models\Color;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

    /**
     * Let the admin view the form to add a color to a user.
     *
     * @param User $user
     * @return View
     */
    public function changeColor(User $user): View
    {
        return view('color', [
            'colors' => Color::all(),
            'userToChange' => $user
        ]);
    }

    /**
     * Lets the admin add a color of a user.
     *
     * @param ChangeUserColor $request
     * @param User $user
     * @return RedirectResponse
     */
    public function changeUserColor(ChangeUserColor $request, User $user): RedirectResponse
    {
        if ($request->validated()) {
            $color = Color::whereName($request->get('color'))->firstOrFail();
            $user->colors()->syncWithoutDetaching($color->id);
        }

        return redirect()->route('dashboard');
    }

    /**
     * Lets the admin delete a color of a user.
     *
     * @param ChangeUserColor $request
     * @param User $user
     * @return RedirectResponse
     */
    public function deleteUserColor(ChangeUserColor $request, User $user): RedirectResponse
    {
        if ($request->validated()) {
            $color = Color::whereName($request->get('color'))->firstOrFail();
            $user->colors()->detach($color->id);
        }

        return redirect()->route('dashboard');
    }
}
