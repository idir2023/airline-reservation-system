<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ConsultationFormulaire extends Model
{

    protected $fillable = ['consultation_id', 'nom', 'prenom', 'description', 'numerTele'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
}
