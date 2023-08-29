<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function auth;
use function request;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('Admin.pages.login.loginPage');
    }

    public function login()
    {
        $credentials = request()->only('email', 'password');
        if(auth()->attempt($credentials) && (auth()->user()->role == 'admin')){
            return redirect()->route('admin.index');
        }
        $this->handellogout();
        return redirect()->back()->with(['error' => 'Invalid Credentials']);
    }
    public function logout()
    {
        $this->handellogout();
        return redirect()->route('admin.loginPage');
    }

    private function handellogout()
    {
        Auth::logout();
        request()->session()->invalidate();
    }
}
