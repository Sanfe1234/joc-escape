<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Models\Joc;
use App\Models\Participant;
use App\Models\Resenya;
use App\Models\Reserva;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use DateTime;
use function PHPUnit\Framework\isNull;
use function Sodium\add;


class ReservaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function goToReserva($jocId)
    {
        $sales_disponibles = array();
        foreach (Sala::all() as $s) {
            if (!Reserva::where('id_sala', $s->id)->exists()) {
                array_push($sales_disponibles, $s);
            }
        }
        return view('reserves.new_reserva-user')->with(['joc' => Joc::find($jocId)])->with('sales', $sales_disponibles);
    }

    public function adminSee($reservaId)
    {
        $reserva = Reserva::find($reservaId);

        $participantsArray = array();
        foreach (Participant::all() as $p) {
            if (Reserva::where('id', $p->id_reserva)->exists()) {
                array_push($participantsArray, $p);
            }
        }
        dd($participantsArray);

        //^^^  ARREGLAR AIXÒ  ^^^ (retorna tots els participants en comptes dels k te la reserva)

        return view('reserves.show_reserva-admin')->with('reserva', $reserva)->with('buyer', User::find($reserva->id_user))->with('sala', Sala::find($reserva->id_sala))->with('joc', Joc::find($reserva->id_joc))->with('participants', $participantsArray);
    }

    public function validar($reservaId)
    {
        $reserva = Reserva::find($reservaId);
        $reserva->validat = 1;
        $reserva->save();

        $experiencia = new Experiencia();
        $experiencia->id_joc = $reserva->id_joc;
        $experiencia->id_reserva = $reserva->id;
        $experiencia->id_empleat = Auth::id();
        $experiencia->winner = false;
        $experiencia->save();

        return view('reserves.show_reserva-admin')->with('reserva', $reserva)->with('buyer', User::find($reserva->id_user))->with('sala', Sala::find($reserva->id_sala))->with('joc', Joc::find($reserva->id_joc));
    }

    public function show()
    {
        $reserves = Reserva::all();
        if (session('admin')) {
            return view('reserves.show_reserves')->with('reserves', $reserves);
        } else {
            return redirect('/');
        }


    }

    public function save(Request $request)
    {
        $request->validate([
            'data_reserva' => 'required',
            'sala' => 'required',
        ]);

        $req = $request->all();

        //dump($req);

        $reserva = new Reserva();
        $reserva->id_user = $req['userId'];
        $reserva->id_sala = $req['sala'];
        $reserva->data_reserva = $req['data_reserva'];
        $reserva->validat = false;
        $reserva->save();


        for ($i = 1; $i < $req['maxPlayers']; $i++) {
            //dump($req['participant-' . ($i + 1)]);
            if ($req['participant-' . ($i + 1)]) {
                //dump(($i + 1) . ": ok");
                $participant = new Participant();
                $participant->id_reserva = $reserva->id;
                $participant->name = $req['participant-' . ($i + 1)];
                $participant->save();
            } else {
                //dump(($i + 1) . ": null");
            }
        }

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
