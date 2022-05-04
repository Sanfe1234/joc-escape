<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ExperienciaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        $experiencies = Experiencia::all();
        if (session('admin')) {
            return view('experiencies.show_experiencies')->with('experiencies', $experiencies);
        } else {
            return redirect('/');
        }
    }

    public function win($experienciaId)
    {
        $e = Experiencia::find($experienciaId);
        $e->winner = 1;
        $e->save();

        $v = new Voucher();
        $v->id_user = User::find($e->id_reserva)->id;
        $v->discount = 10;
        $v->save();

        return redirect('/llista-experiencies');
    }

    public function save()
    {
        $req = request()->all();

        $experiencia = new Experiencia();

        //dd($req);

        $experiencia->id_joc = $req['jocId'];
        $experiencia->id_reserva = $req['reservaId'];
        $experiencia->id_empleat = $req['empleatId'];
        $experiencia->winner = false;
        $experiencia->save();

        return redirect('/llista-experiencies');
    }

    public function edit(Experiencia $experiencia)
    {
        //dd($voucher);
        return view('experiencies.edit_experiencia')->with(['experiencia' => $experiencia]);
    }

    public function update(Request $req, Experiencia $experiencia)
    {
        $data = $req->all();
        //dd($data);

        $experiencia->id_joc = $data['jocId'];
        $experiencia->id_reserva = $data['reservaId'];
        $experiencia->id_empleat = $data['empleatId'];
        $experiencia->winner = false;
        $experiencia->save();

        return redirect('/llista-experiencies');
    }

    public function destroy($experienciaId)
    {
        $experiencia = Experiencia::find($experienciaId);
        $experiencia->delete();
        return redirect('/llista-experiencies');
    }
}
