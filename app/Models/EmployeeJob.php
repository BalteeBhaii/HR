<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class EmployeeJob extends Model
{
    use HasFactory;
    protected $table = 'employeejobs';


    static public function getRecord($request) {

        $return = self::select('employeejobs.*');

        // search box start
        if (!empty(Request::get('id'))) {
            $return = $return->where('id', Request::get('id'));
        }

        if (!empty(Request::get('job_title'))) {
            $return = $return->where('job_title', 'like', '%' . Request::get('job_title') . '%');
        }

        if (!empty(Request::get('min_salary'))) {
            $minSalary = intval(Request::get('min_salary'));
            $return = $return->whereRaw('CAST(min_salary AS UNSIGNED) >= ?', [$minSalary]);
        }

        if (!empty(Request::get('max_salary'))) {
            $maxSalary = intval(Request::get('max_salary'));
            $return = $return->whereRaw('CAST(max_salary AS UNSIGNED) <= ?', [$maxSalary]);
        }

        if(!empty(Request::get('start_date')) && !empty(Request::get('end_date'))){
            $startDate = date('Y-m-d' , strtotime(Request::get('start_date')));
            $endDate = date('Y-m-d' , strtotime(Request::get('end_date')));

            // adding by 1 so it getting proper result
            $endDate = date('Y-m-d' , strtotime($endDate . '+1 day'));

            if($startDate <= $endDate){
                $return = $return->where('created_at' ,'>=' , $startDate)->where('created_at' , '<=' , $endDate);
            }
        }

        $return = $return->orderBy('id', 'desc')->paginate(20);

        return $return;
    }

}
