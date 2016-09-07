<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;

class DashBoardController extends Controller
{
    public function index()
    {

        return view('page.dashboard');
    }
}
