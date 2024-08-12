<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  
    protected $fillable = [
        'nomcomplet', 'datededepot', 'dateReponse', 'accordounon', 'description'
    ];
}
