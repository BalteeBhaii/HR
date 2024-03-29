<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class JobHistory extends Model
{
    use HasFactory;
    protected $table = 'job_history';

    static public function getRecord($request){
        $query = self::select(
                'job_history.id',
                'users.name',
                'users.last_name',
                'users.email',
                'job_history.start_date',
                'job_history.end_date',
                'employeejobs.job_title',
                'job_history.department_id',
                'job_history.employee_id',
                'job_history.job_id',
                'job_history.created_at'
            )
            ->join('users', 'users.id' , '=' , 'job_history.employee_id')
            ->join('employeejobs', 'employeejobs.id' , '=', 'job_history.job_id')
            ->orderBy('job_history.id', 'desc');

        if(!empty(Request::get('id'))){
            $query->where('job_history.id', '=', Request::get('id'));
        }

        if(!empty(Request::get('name'))){
            $query->where('users.name', 'like', '%'.Request::get('name').'%');
        }

        if(!empty(Request::get('start_date'))){
            $query->where('job_history.start_date', '=', Request::get('start_date'));
        }

        if(!empty(Request::get('end_date'))){
            $query->where('job_history.end_date', '=', Request::get('end_date'));
        }

        if(!empty(Request::get('job_title'))){
            $query->where('employeejobs.job_title', 'like', '%'.Request::get('job_title').'%');
        }


        return $query->get();
    }


    public function get_user_name_single(){
        return $this->belongsTo(User::class , "employee_id");
    }

    public function get_job_name_single(){
        return $this->belongsTo(EmployeeJob::class , "job_id");
    }


}
