<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login () {
        if (Auth::attempt())
            if (auth()->user()->role == 'admin' && auth()->user()->role == 'operator')
                return redirect()->route('admin.dashboard');
        return view('admin.login');
    }

    public function postLogin (Request $request) {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],

            [
                'email.required' => trans('message.email_required', []),
                'password.required' => trans('message.password_required', [])
            ]
        );
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $remember_me = $request->remember_me ? true : false;
        if (Auth::attempt($credentials, $remember_me)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(trans('message.login_wrong'));
    }

    public function dashboard() {

        return view('admin.dashboard');
    }
    public function logout () {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
