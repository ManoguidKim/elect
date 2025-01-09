<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangepasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function changePasswordView()
    {
        return view('change-password');
    }

    public function changePassword(ChangepasswordRequest $request)
    {
        // Update the user's password
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        // Regenerate the session to prevent session fixation attacks
        Session::invalidate();
        Session::regenerate();

        return redirect()->route('login')->with('status', 'Password successfully changed. Please log in again.');
    }
}
