<?php

namespace App\Models;

use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joc extends Model
{
    use HasFactory;

    protected $table = "joc";
    public $timestamps = false;
}
