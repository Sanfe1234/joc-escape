<?php

namespace App\Http\Controllers;

use App\Models\Imatge;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\Console\Input\Input;

class ImageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getImage($game_Id)
    {
        $imgs = Imatge::all();

        foreach ($imgs as $i) {
            if ($i['id'] == $game_Id) {
                return $i;
            }
        }

    }
}
