<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeJob;
use App\Models\JobHistory;

class JobHistoryController extends Controller
{
    public function index(Request $request){

        return view('backend.job_history.list');

    }

    public function add(){

        $data['getJobs'] = EmployeeJob::get();
        $data['getEmployees'] = User::where('is_role' , 0)->get();
        return view('backend.job_history.add', $data);

    }
}
