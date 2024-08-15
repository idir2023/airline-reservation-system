<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews'; 
    protected $fillable = [
        'nomcomplet', 'datededepot', 'dateReponse','lieu_depot_id','lieu_depot', 'accordounon', 'description'
    ];
    'nomcomplet', 
        'datededepot', 
        'dateReponse', 
        'accordounon', 
        'description', 
        'lieu_depot_id

  
    public function lieuDepot()
{
    return $this->belongsTo(LieuDepot::class, 'lieu_depot_id');
}

}
