<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\models\Customer;
use Auth;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::select();
        if (isset($request->search)) {
            $customers = $customers->orWhere('name', 'like', '%' . $request->search . '%');
            $customers = $customers->orWhere('email', 'like', '%' . $request->search . '%');
            $customers = $customers->orWhere('company', 'like', '%' . $request->search . '%');
        }
        $customers = $customers->orderBy('id', 'desc')->paginate(30);
        return view('page.dashboard', compact('customers','request'));
    }
}
