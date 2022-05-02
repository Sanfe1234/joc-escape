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
        $request->validate([
            'mail' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($request->only('mail', 'password'))) {
            $request->session()->regenerate();
            Session::put('loginError', false);

            if (Auth::user()['id_rol'] == 2) {
                Session::put('admin', true);
                return redirect("/Gestor");
            }

            return redirect("/");

        } else {
            Session::put('loginError', "Hi ha hagut un error en algun camp. Torna-ho a intentar");
            return redirect('/login-page');
        }

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login-page');
    }
}
