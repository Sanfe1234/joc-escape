<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use App\Models\Resenya;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\Console\Input\Input;

class ResenyaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        $resenyes = Resenya::all();
        if (session('admin')) {
            return view('resenyes.show_resenyes')->with('resenyes', $resenyes);
        } else {
            return redirect('/');
        }
    }

    public function save()
    {
        $req = request()->all();
        $resenya = new Resenya();

        //dd($req);

        $resenya->id_user = $req['userId'];
        $resenya->id_experience = $req['experienciaId'];
        $resenya->puntuacio = $req['valoracio'];
        $resenya->data_resenya = date("Y-m-d");
        $resenya->text = $req['text'];
        $resenya->save();

        return redirect('/llista-resenyes');
    }

    public function edit(Resenya $resenya)
    {
        //dd($voucher);
        return view('resenyes.edit_resenya')->with(['resenya' => $resenya]);
    }

    public function update(Request $req, Resenya $resenya)
    {
        $data = $req->all();

        $resenya->id_user = $data['userId'];
        $resenya->id_experience = $data['experienciaId'];
        $resenya->puntuacio = $data['valoracio'];
        $resenya->text = $data['text'];
        $resenya->save();

        return redirect('/llista-resenyes');
    }

    public function destroy($resenyaId)
    {
        $resenya = Resenya::find($resenyaId);
        $resenya->delete();
        return redirect('/llista-resenyes');
    }
}
