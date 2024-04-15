<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';

    static public function getRecord(){
        $return = self::select('locations.*','countries.country_name')
        ->join('countries' , 'countries.id' , '=' , 'locations.countries_id')
        ->orderBy('id' , 'desc')
        ->paginate(20);

        return $return;
    }



}
