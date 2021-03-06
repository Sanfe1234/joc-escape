<?php

namespace App\Http\Controllers;

use App\Models\Imatge;
use App\Models\Joc;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        $users = User::all();
        if (session('admin')) {
            return view('users.show_users')->with('users', $users);
        } else {
            return redirect('/');
        }
    }

    public function goToNewUserAdmin()
    {
        if (session('admin')) {
            return view('users.create_user-admin');
        } else {
            return redirect('/');
        }
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $user = new User();
        $idRol = 1;

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'dni' => 'required|unique:user',
            'email' => 'required|email|unique:users,email',
            'mail' => 'required',
            'phone' => 'required',
        ]);

        //dd($req);
        if (@isset($req['admin'])) {
            $idRol = 2;
        }
        $user->id_rol = $idRol;
        $user->name = $req['name'];
        $user->password = bcrypt($req['password']);
        $user->dni = $req['dni'];
        $user->mail = $req['mail'];
        $user->phone = $req['phone'];
        $user->country = $req['country'];
        $user->company = $req['company'];
        $user->save();

        return redirect('/llista-users');
    }

    public function edit(User $user)
    {
        return view('users.edit_user')->with(['user' => $user]);
    }

    public function update(Request $req, User $user)
    {
        $data = $req->all();
        //dd($req);

        $user->id_rol = 1;
        $user->name = $data['name'];
        $user->password = $data['password'];
        $user->dni = $data['dni'];
        $user->mail = $data['mail'];
        $user->phone = $data['phone'];
        $user->country = $data['country'];
        $user->company = $data['company'];
        $user->save();

        return redirect('/llista-users');
    }

    public function destroy($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return redirect('/llista-users');
    }
}
