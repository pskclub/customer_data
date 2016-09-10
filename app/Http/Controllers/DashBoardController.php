<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\models\Customer;
use Auth;

class DashBoardController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->paginate(30);
        return view('page.dashboard', compact('customers'));
    }
}
