<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    protected $guarded = [];
}
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'tele',
        'email',
        'pdf_path',
    ];
}
