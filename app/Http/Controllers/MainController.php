<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->type == 'admin') {
            return redirect('dashboard');
        }
        return redirect('login');
    }

    public function genHash($pass)
    {

        return bcrypt($pass);
    }
}
