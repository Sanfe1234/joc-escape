<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('mail', 'password'))) {
            if (Auth::user()['id_rol'] == 2) {
                Session::put('admin', true);
            }

            //$request->session()->regenerate();

            return redirect("/");

        } else {
            return redirect('login');
        }

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
