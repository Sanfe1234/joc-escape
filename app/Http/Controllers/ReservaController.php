<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\Console\Input\Input;
use DateTime;


class ReservaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        $reserves = Reserva::all();

        return view('reserves.show_reserves')->with('reserves', $reserves);
    }

    public function save()
    {
        $req = request()->all();
        $reserva = new Reserva();

        //dd($req);

        $reserva->id_user = $req['userId'];
        $reserva->id_sala = $req['salaId'];
        $reserva->data_reserva = $req['data_reserva'];
        $reserva->validat = false;
        $reserva->save();

        return redirect('/llista-reserves');
    }

    public function edit(Reserva $reserva)
    {
        return view('reserves.edit_reserva')->with(['reserva' => $reserva]);
    }

    public function update(Request $req, Reserva $reserva)
    {
        $data = $req->all();

        //dd($req);

        $reserva->id_user = $data['userId'];
        $reserva->id_sala = $data['salaId'];
        $reserva->data_reserva = $data['data_reserva'];
        $reserva->validat = $data['validat'];
        $reserva->save();

        return redirect('/llista-reserves');
    }

    public function destroy($reservaId)
    {
        $reserva = Reserva::find($reservaId);
        $reserva->delete();
        return redirect('/llista-reserves');
    }
}
