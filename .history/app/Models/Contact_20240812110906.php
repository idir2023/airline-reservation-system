<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];
    protected $fillable = ['nom', 'tele', 'email', 'description'];

}
