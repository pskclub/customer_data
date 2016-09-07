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
        return view('page.login');
    }
}
