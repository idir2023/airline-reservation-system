<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image'];

    public function formulaires()
    {
        return $this->hasMany(ConsultationFormulaire::class, 'assurance_id');
    }
}
