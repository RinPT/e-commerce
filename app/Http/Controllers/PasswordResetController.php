<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{
    public function index() {
        return view('users.lost_password');
    }

    public function generate_token(Request $request) {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ? back()->with('success', 'We sent you an email. Please also check your spam box.') : back()->with('error', 'Something went wrong! Please try again.');
    }

    public function reset_password($token) {
        return view('users.reset_password', [
            'token' => $token
        ]);
    }

    public function password_store(Request $request) {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::RESET_LINK_SENT
                        ? redirect()->route('login')->with('success', 'Login with your new password')
                        : back()->with('error', 'Something went wrong! Please try again.');
    }
}
