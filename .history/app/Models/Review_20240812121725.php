<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'contact'; 
    protected $fillable = [
        'nomcomplet', 'datededepot', 'dateReponse', 'accordounon', 'description'
    ];
}
