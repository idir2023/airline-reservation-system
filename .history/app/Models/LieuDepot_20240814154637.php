<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LieuDepot extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

   
    public function reviews()
{
    return $this->hasMany(Review::class, 'lieu_depot_id');
}

}
