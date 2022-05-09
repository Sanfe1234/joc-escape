<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Models\Imatge;
use App\Models\Joc;
use App\Models\Reserva;
use App\Models\Sala;
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

    public function getReservesFromUser()
    {
        $reserves = Reserva::all();
        $sales = Sala::all();
        $jocs = Joc::all();
        $res = array();

        foreach ($reserves as $r) {
            $res_reserva = array();
            if ($r->id_user == Auth::id()) {
                array_push($res_reserva, $r);

                foreach ($jocs as $j) {
                    if ($j->id == $r->id_joc) {
                        array_push($res_reserva, $j->name);
                    }
                }

                foreach ($sales as $s) {
                    if ($s->id == $r->id_sala) {
                        array_push($res_reserva, $s->name);
                    }
                }

                array_push($res, $res_reserva);
            }
        }

        //dd($res);

        return $res;
    }

    public function getVouchersFromUser()
    {
        $vouchers = Voucher::all();
        $res = array();

        foreach ($vouchers as $v) {
            if (Auth::id() == $v->id_user) {
                array_push($res, $v);
            }
        }

        return $res;

    }
}
