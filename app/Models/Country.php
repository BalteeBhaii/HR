<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';

    public function get_region_name(){
        return $this->belongsTo(Region::class , 'region_id');
    }

}
