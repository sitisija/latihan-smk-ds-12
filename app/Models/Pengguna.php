<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//as itu fungsi agar jadi alias min 
use Illuminate\Foundation\Auth\User as Authenticatable;


class Pengguna extends Authenticatable
{
    use HasFactory;
    protected $table='pengguna';
}
