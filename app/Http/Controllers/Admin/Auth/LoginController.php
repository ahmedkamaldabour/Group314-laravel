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
        $this->handlelogout();
        return redirect()->back()->with(['error' => 'Invalid Credentials']);
    }
    public function logout()
    {
        $this->handlelogout();
        return redirect()->route('admin.loginPage');
    }

    private function handlelogout()
    {
        Auth::logout();
        request()->session()->invalidate();
    }
}












//->withInput(['email' => request()->email])
