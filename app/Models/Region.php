<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Region extends Model
{
    use HasFactory;
    protected $table = 'regions';

    static public function getRecord($request){

        $return = self::select('regions.*');

        if(!empty(Request::get('id'))){
            $return = $return->where('id' , Request::get('id'));
        }

        if(!empty(Request::get('region'))){
            $return = $return->where('region_name' , 'like' , '%'.Request::get('region').'%');
        }

        $return = $return->orderBy('id' , 'desc')
        ->paginate(20);

        return $return;
    }
}
