<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    public function formulaires()
    {
        return $this->hasMany(ConsultationFormulaire::class, 'consultation_id');
    }
}
