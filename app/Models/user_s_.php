<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_s_ extends Model
{
    use HasFactory;
    protected $table = 'user_s_';
    protected $fillable = [
        'id',
        'name',
        'family',
        'code_mely',
        'hoghogh',
    ];
}
