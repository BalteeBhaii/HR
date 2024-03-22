<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeJob;

class JobController extends Controller
{

    public function index(Request $request){

         $data['getRecord'] = EmployeeJob::getRecord();
        return view('backend.jobs.list', $data);

    }

    public function add(){
        return view('backend.jobs.add');
    }

    public function add_post(Request $request){

        $job = request()->validate([
            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required'
        ]);

        $job = new EmployeeJob;
        $job->job_title = trim($request->job_title);
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);

        $job->save();

        return redirect('admin/jobs')->with('success' , 'Jobs added successfully..');
    }

    public function view($id){

        $data['getRecord'] = EmployeeJob::find($id);

        return view('backend.jobs.view',$data);
    }

    public function edit($id){

        $data['getRecord']  = EmployeeJob::find($id);

        return view('backend.jobs.edit', $data);
    }

    public function edit_update($id, Request $request){

        $job = EmployeeJob::find($id);
        $job->job_title = trim($request->job_title);
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);

        $job->save();

        return redirect('admin/jobs')->with('success' , 'Job has been updated Successfully.');

    }

    public function delete($id){

        $job = EmployeeJob::find($id);
        $job->delete();
        return back()->with('success' , 'Job has been deleted Successfull..');
    }
}
