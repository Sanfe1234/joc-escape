<?php

namespace App\Http\Controllers;

use App\Models\Imatge;
use App\Models\Joc;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\Console\Input\Input;

class JocController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showSingle($jocID)
    {
        return view('jocs.single_joc')->with(['joc' => Joc::find($jocID)]);
    }

    public function show()
    {
        $jocs = Joc::all();
        if (session('admin')) {
            return view('jocs.show_jocs')->with('jocs', $jocs);
        } else {
            return redirect('/');
        }
    }

    public function save()
    {
        $alert_list = array();

        //dd(request()->all());
        $req = request()->all();


        $joc = new Joc();
        $img = new Imatge();

        $file = $req['image'];
        $image_file = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), $image_file);

        $joc->name = $req['name'];
        $joc->max_players = $req['max'];
        $joc->min_players = $req['min'];
        $joc->save();

        $img->id_joc = $joc->id;
        $img->url = "/img/" . $image_file;
        $img->save();


        return redirect('/');
    }

    public function destroy($jocId)
    {
        if (Imatge::find($jocId)) {
            $imatge = Imatge::find($jocId);
            //dd($imatge);
            $imatge->delete();
        }
        $joc = Joc::find($jocId);
        //dd($joc);
        $joc->delete();

        return redirect('/llista-jocs');
    }

    public function edit(Joc $joc)
    {
        return view('jocs.edit_game')->with(['joc' => $joc]);
    }

    public function update(Request $req, Joc $joc)
    {
        //$validated = $this->validateJoc($req)
        $data = $req->all();
        $img = new Imatge();

        $file = $data['image'];
        $image_file = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), $image_file);

        $joc->name = $data['name'];
        $joc->max_players = $data['max'];
        $joc->min_players = $data['min'];
        $joc->save();

        $img->id_joc = $joc->id;
        $img->url = "/img/" . $image_file;
        $img->save();

        return redirect('/');
    }
}
