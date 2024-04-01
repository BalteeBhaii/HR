<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobGrade extends Model
{
    use HasFactory;
    protected $table  = 'job_grades';

    protected function getRecord($request){
        $return = self::select('job_grades.*');

        if(!empty(Request::get('id'))){
            $return = $return->where('id', Request::get('id'));
        }

        if(!empty(Request::get('grade_level'))){
            $return = $return->where('grade_level' , 'like' ,'%'.Request::get('grade_level').'%');
        }

        $return = $return->orderBy('id' ,'desc')->paginate(20);
        return $return;
    }
}
