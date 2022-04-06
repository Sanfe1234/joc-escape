<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\Console\Input\Input;

class ExperienciaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        $experiencies = Experiencia::all();

        return view('experiencies.show_experiencies')->with('experiencies', $experiencies);
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
