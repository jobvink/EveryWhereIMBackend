<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    /**
     * Lets the user delete their account
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|string[]
     */
    public function destroy(DeleteAccountRequest $request)
    {
        $deleted = \Auth::user()->delete();

        if ($request->expectsJson()) {
            return ['status' => $deleted ? 'success' : 'failed'];
        }

        return redirect()->route('login');
    }
}
