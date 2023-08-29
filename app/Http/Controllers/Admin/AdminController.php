<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use function auth;
use function dump;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }
}
