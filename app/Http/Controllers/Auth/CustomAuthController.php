<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function getLogin()
    {
        return view('page.auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function postLogin(Request $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'type' => 'admin'], $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->with('err', "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
        }

    }


}
