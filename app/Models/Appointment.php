<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['date', 'title', 'description'];

}
