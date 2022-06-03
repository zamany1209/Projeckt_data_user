<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoghogh extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'family',
        'code_mely',
        'age',
        'hoghogh',
    ];
}
