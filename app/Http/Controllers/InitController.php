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
use Carbon\Traits\Date;
use Faker\Provider\DateTime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;

class InitController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loadBBDD()
    {
        $init = new InitController();

        if (!Rol::exists()) {
            $init->createRols();
        }

        if (!User::exists()) {
            $init->createUsers();
        }

        if (!Joc::exists()) {
            $init->createJocs();
        }

        if (!Sala::exists()) {
            $init->createSala();
        }

        if (!Reserva::exists()) {
            $init->createReserva();
        }

        if (!Experiencia::exists()) {
            $init->createExperiencia();
        }

        if (!Participant::exists()) {
            $init->createParticipant();
        }

        if (!Resenya::exists()) {
            $init->createResenya();
        }

        if (!Imatge::exists()) {
            $init->createImatge();
        }

        if (!Voucher::exists()) {
            $init->createVoucher();
        }

        $users = User::all();
        return redirect('/');
    }

    public function deleteBBDD()
    {
        Imatge::query()->forceDelete();
        Voucher::query()->forceDelete();
        Participant::query()->forceDelete();
        Resenya::query()->forceDelete();
        Experiencia::query()->forceDelete();
        Reserva::query()->forceDelete();
        User::query()->forceDelete();
        Joc::query()->forceDelete();
        Sala::query()->forceDelete();
        Rol::query()->forceDelete();

        return redirect('/');
    }

    public function createRols()
    {
        Rol::query()->delete();

        $rol1 = new Rol;
        $rol1->name = "Client";
        $rol1->save();

        $rol2 = new Rol;
        $rol2->name = "Empleat";
        $rol2->save();
    }

    public function createUsers()
    {
        User::query()->delete();

        $empleat1 = new user;
        $empleat1->id_rol = 2;
        $empleat1->name = 'Hector Ortiz';
        $empleat1->password = bcrypt('admin');
        $empleat1->dni = '6246831g';
        $empleat1->mail = 'Hector@escapesmanolito.com';
        $empleat1->phone = '734931472';
        $empleat1->country = 'EspaÑa';
        $empleat1->company = '';
        $empleat1->save();

        $empleat2 = new user;
        $empleat2->id_rol = 2;
        $empleat2->name = 'Maribel';
        $empleat2->password = bcrypt('admin');
        $empleat2->dni = '7564323Fs';
        $empleat2->mail = 'Maribel@escapesmanolito.com';
        $empleat2->phone = '123456789';
        $empleat2->country = 'Guatelama';
        $empleat2->company = '';
        $empleat2->save();

        $client1 = new user;
        $client1->id_rol = 1;
        $client1->name = 'Jofre Skerecasiotolli';
        $client1->password = bcrypt('1234');
        $client1->dni = '62413894L';
        $client1->mail = 'Jofre@gmail.com';
        $client1->phone = '730520531';
        $client1->country = 'Cataluña';
        $client1->company = 'Xixuvic';
        $client1->save();

        $client2 = new user;
        $client2->id_rol = 1;
        $client2->name = 'Marc Serrat Aplanat';
        $client2->password = bcrypt('1234');
        $client2->dni = '1234567G';
        $client2->mail = 'Marc@gmail.com';
        $client2->phone = '123456789';
        $client2->country = 'Andorra';
        $client2->company = '';
        $client2->save();
    }

    public function createJocs()
    {
        Joc::query()->delete();

        $joc1 = new joc;
        $joc1->name = 'Escape from Tarkov';
        $joc1->max_players = 4;
        $joc1->min_players = 2;
        $joc1->save();

        $joc2 = new joc;
        $joc2->name = "Mikey's fun house";
        $joc2->max_players = 6;
        $joc2->min_players = 1;
        $joc2->save();
    }

    public function createSala()
    {
        Sala::query()->delete();

        $sala1 = new sala;
        $sala1->name = 'Sala 1';
        $sala1->save();

        $sala2 = new sala;
        $sala2->name = 'Sala 2';
        $sala2->save();

    }

    public function createReserva()
    {
        Reserva::query()->delete();

        $res1 = new Reserva;
        $res1->id_user = 3;
        $res1->id_sala = 1;
        $res1->id_joc = 1;
        $res1->data_reserva = Carbon::now()->addDays(5);
        $res1->validat = false;
        $res1->save();

        $res1 = new Reserva;
        $res1->id_user = 4;
        $res1->id_sala = 1;
        $res1->id_joc = 2;
        $res1->data_reserva = Carbon::now()->addDays(5);
        $res1->validat = false;
        $res1->save();

    }

    public function createExperiencia()
    {
        Experiencia::query()->delete();

        $exp1 = new Experiencia;
        $exp1->id_joc = 1;
        $exp1->id_reserva = 1;
        $exp1->id_empleat = 2;
        $exp1->winner = false;
        $exp1->save();

        $exp2 = new Experiencia;
        $exp2->id_joc = 2;
        $exp2->id_reserva = 2;
        $exp2->id_empleat = 1;
        $exp2->winner = true;
        $exp2->save();
    }

    public function createParticipant()
    {
        Participant::query()->delete();

        $part1 = new Participant;
        $part1->id_reserva = 1;
        $part1->name = "Janki Antena";
        $part1->save();

        $part2 = new Participant;
        $part2->id_reserva = 1;
        $part2->name = "Bartosc Wisconsin";
        $part2->save();

        $part3 = new Participant;
        $part3->id_reserva = 2;
        $part3->name = "Samu'el N'tim";
        $part3->save();

        $part4 = new Participant;
        $part4->id_reserva = 2;
        $part4->name = "Romy Randa";
        $part4->save();

        $part5 = new Participant;
        $part5->id_reserva = 2;
        $part5->name = "Izan Morales";
        $part5->save();

    }

    public function createResenya()
    {
        Resenya::query()->delete();

        $res1 = new Resenya;
        $res1->id_experience = 1;
        $res1->id_user = 3;
        $res1->data_resenya = Carbon::now()->addDays(5)->addHours(3);
        $res1->puntuacio = 8;
        $res1->text = "Va ser molt divertit, vam poder veure com queien bombes i mataven a civils. Però em vaig embrutar el volso Giorgio&Buittoni de sang :(";
        $res1->save();

        $res2 = new Resenya;
        $res2->id_experience = 2;
        $res2->id_user = 4;
        $res2->data_resenya = Carbon::now()->addDays(5)->addHours(3);
        $res2->puntuacio = 1;
        $res2->text = "Pensava k era una aventura divertida pels nens. Vaig sortir amb el cul tort. I fa dies k espero k surti el meu fill gran. No hi tornaré pas";
        $res2->save();
    }

    public function createImatge()
    {
        Imatge::query()->delete();

        $img1 = new Imatge();
        $img1->id_joc = 1;
        $img1->url = "/img/Escape-from-tarkov_1.jpg";
        $img1->save();

        $img2 = new Imatge();
        $img2->id_joc = 2;
        $img2->url = "/img/Mickey_1.jpg";
        $img2->save();
    }

    public function createVoucher()
    {
        Voucher::query()->delete();

        $vou1 = new Voucher();
        $vou1->id_user = 4;
        $vou1->discount = 10;
        $vou1->save();
    }
}
