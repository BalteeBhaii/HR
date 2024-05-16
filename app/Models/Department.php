<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";

    static function getRecord($request){

        $return = self::select('departments.*' ,'locations.street_address', 'locations.city')
        ->join('locations' , 'locations.id' , '=' , 'departments.locations_id')
        ->orderBy('id' , 'desc');

        $return = $return->paginate(20);

        return $return;

    }

    public function get_single_manager_name(){
        return $this->belongsTo(Manager::class , 'manager_id');
    }
}
