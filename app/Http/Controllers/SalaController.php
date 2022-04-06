<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\Console\Input\Input;

class SalaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        $sales = Sala::all();

        return view('sales.show_sales')->with('sales', $sales);
    }

    public function save()
    {
        $req = request()->all();
        $sala = new Sala();

        //dd($req);

        $sala->name = $req['name'];
        $sala->save();

        return redirect('/llista-sales');
    }

    public function edit(Sala $sala)
    {
        return view('sales.edit_sala')->with(['sala' => $sala]);
    }

    public function update(Request $req, Sala $sala)
    {
        $data = $req->all();

        $sala->name = $data['name'];
        $sala->save();

        return redirect('/llista-sales');
    }

    public function destroy($salaId)
    {
        $sala = Sala::find($salaId);
        $sala->delete();
        return redirect('/llista-sales');
    }
}
