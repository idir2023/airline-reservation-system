<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AssuranceFormulaire extends Model
{
    protected $fillable = ['assurance_id', 'nom', 'prenom', 'description', 'numerTele'];
    public function assurance()
    {
        return $this->belongsTo(Assurance::class, 'assurance_id');
    }
}
