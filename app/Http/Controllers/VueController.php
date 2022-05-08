<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Models\Imatge;
use App\Models\Joc;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Voucher;
use http\Env\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class VueController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAllJocs()
    {
        $jocs = Joc::orderBy('id', 'desc')->get();
        $reserves = Reserva::all();
        $imatges = Imatge::all();
        $res = array();


        foreach ($jocs as $j) {
            $res_joc = array();
            $reserves_joc = array();
            array_push($res_joc, $j);

            foreach ($imatges as $img) {
                if ($img->id_joc == $j->id) {
                    array_push($res_joc, $img);
                }
            }

            foreach ($reserves as $r) {
                if ($r->id_joc == $j->id) {
                    array_push($reserves_joc, $r);
                }
            }

            array_push($res_joc, $reserves_joc);
            array_push($res, $res_joc);
        }

        //dd($res);
        return $res;
    }

    public function getSingleJoc($idJoc)
    {
        $joc = Joc::find($idJoc);
        $imatges = Imatge::all();
        $res = array();
        $auth = false;
        array_push($res, $joc);

        foreach ($imatges as $img) {
            if ($img->id == $joc->id) {
                array_push($res, $img);
            }
        }

        if (Auth::check()) {
            $auth = true;
        }

        array_push($res, $auth);

        return $res;
    }
}
