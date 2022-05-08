<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Models\Imatge;
use App\Models\Joc;
use App\Models\Participant;
use App\Models\Resenya;
use App\Models\Reserva;
use App\Models\Rol;
use App\Models\Sala;
use App\Models\User;
use App\Models\Voucher;
use Faker\Provider\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index()
    {

        return view('home');
    }

    public function backoffice()
    {
        $jocs = Joc::all();
        $imgs = Imatge::all();

        if (session('admin')) {
            return view('gestor')->with('jocs', $jocs)->with('imgs', $imgs);
        } else {
            return view('home')->with('jocs', $jocs)->with('imgs', $imgs);
        }

    }


}
