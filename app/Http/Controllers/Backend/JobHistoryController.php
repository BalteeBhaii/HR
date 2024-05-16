<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeJob;
use App\Models\JobHistory;
use App\Models\Department;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobHistoryExport;



class JobHistoryController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = JobHistory::getRecord($request);
        return view('backend.job_history.list' , $data);

    }


    public function job_history_export(Request $request){
        return Excel::download(new JobHistoryExport , 'job_history.xlsx');
    }

    public function add(){

        $data['getJobs'] = EmployeeJob::get();
        $data['getEmployees'] = User::get();
        $data['getDepartment'] = Department::get();
        return view('backend.job_history.add', $data);

    }

    public function add_post(Request $request){

        $user = request()->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'job_id' => 'required',
            'department_id' => 'required'
        ]);

        $user = new JobHistory;
        $user->employee_id = trim($request->employee_id);
        $user->start_date = trim($request->start_date);
        $user->end_date = trim($request->end_date);
        $user->job_id = trim($request->job_id);
        $user->department_id  = trim($request->department_id);

        $user->save();
        return redirect('admin/job_history')->with('success' , 'Job History Successfully..');

    }

    public function edit($id){

        $data['getEmployees'] = User::where('is_role' , 0)->get();
        $data['getJobs'] = EmployeeJob::get();
        $data['getRecord'] = JobHistory::find($id);
        $data['getDepartment'] = Department::get();


        return view('backend.job_history.edit', $data);
    }

    public function edit_update(Request $request ,$id){

        $user  = JobHistory::find($id);
        $user->employee_id = trim($request->employee_id);
        $user->start_date = trim($request->start_date);
        $user->end_date = trim($request->end_date);
        $user->job_id  = trim($request->job_id);
        $user->department_id = trim($request->department_id);

        $user->save();

        return redirect('admin/job_history')->with('success', 'Job History successfully update..');

    }

    public function delete($id){
        $getRecord = JobHistory::find($id);
        $getRecord->delete();
        return redirect()->back()->with('success' , 'Record has been deleted..');
    }




}
