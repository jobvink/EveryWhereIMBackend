<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\User;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;

class UserColorController extends Controller
{
    public function all()
    {
        $userRole = Role::whereSlug('user')->firstOrFail();
        return $userRole->users()->with('colors')->get();
    }

    public function colors(User $user) {
        return $user->colors;
    }

    public function updateColor(Request $request, User $user)
    {
        $color = Color::whereName($request->get('color'))->get()->first();
        $user->colors()->detach(Color::all()->pluck('id'));
        $user->colors()->attach($color->id);
        $user->syncChanges();

        return ['status' => 'success'];
    }
}
