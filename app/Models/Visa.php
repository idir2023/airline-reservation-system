<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $fillable = [
        'type_visa',
        'destination_visa',
        'motif',
        'description',
        'pdf_path',
    ];
}
