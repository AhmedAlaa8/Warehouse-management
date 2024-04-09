<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $cred = $request->only(['email', 'password']);
        $user = User::where('email', $request->email)->first();
        if ($user->is_admin) {
            if (Auth::attempt($cred)) {
                return redirect(route('admin.home'));
            }
        }
        return redirect()->back();
    }

    public function logout()
    {

        Auth::logout();
        return redirect(route('admin.loginPage'));
    }
}
