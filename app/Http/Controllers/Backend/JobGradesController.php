<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobGrade;

class JobGradesController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = JobGrade::getRecord($request);
        return view('backend.job_grades.list' , $data);
    }

    public function add(){

        return view('backend.job_grades.add');
    }

    public function add_post(Request $request){

        $user = request()->validate([
            'grade_level' => 'required',
            'lowest_sal' => 'required',
            'highest_sal' => 'required'
        ]);

        $user = new JobGrade;
        $user->grade_level = trim($request->grade_level);
        $user->highest_sal = trim($request->highest_sal);
        $user->lowest_sal = trim($request->lowest_sal);

        $user->save();

        return redirect('admin/job_grades')->with('success' , 'Job grade added successfully..');

    }

    public function edit($id){

        $data['getRecord'] = JobGrade::find($id);
        return view('backend.job_grades.edit' , $data);
    }

    public function edit_update($id , Request $request){
        $user = JobGrade::find($id);

        $user->grade_level = $request->grade_level;
        $user->lowest_sal = $request->lowest_sal;
        $user->highest_sal = $request->highest_sal;

        $user->save();

        return redirect('admin/job_grades')->with('success' , 'Job Grade updated successfully..');
    }

    public function delete($id){

        $user = JobGrade::find($id);
        $user->delete();

        return redirect()->back()->with('success' , 'Job Grade Deleted Successfully..');
    }
}
