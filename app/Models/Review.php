<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews'; 
    protected $fillable = [
        'nomcomplet', 'datededepot', 'dateReponse','lieu_depot', 'accordounon', 'description'
    ];
}
