<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeJob;

class JobController extends Controller
{

    public function index(Request $request){

        return view('backend.jobs.list');

    }

    public function add(){
        return view('backend.jobs.add');
    }
}
