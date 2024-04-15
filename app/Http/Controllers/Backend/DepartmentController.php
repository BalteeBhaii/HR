<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Location;

class DepartmentController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = Department::getRecord($request);
        return view('backend.department.list' , $data );
    }

    public function add(){
        $data['getLocation']  = Location::get();
        return view('backend.department.add' , $data);
    }

    public function add_post(Request $request){

        $user = request()->validate([
            'department_name' => 'required',
            'manager_id' => 'required',
            'location_id' => 'required'
        ]);

        $user = new Department;
        $user->department_name = trim($request->department_name);
        $user->manager_id = trim($request->manager_id);
        $user->locations_id = trim($request->location_id);

        $user->save();

        return redirect("admin/departments")->with("success" , 'Deparmtent has been added succesfully..');
    }

    public function edit($id){

        $data['getDepartment'] = Department::find($id);
        $data['getLocation'] = Location::get();

        return view('backend.department.edit', $data);
    }

    public function edit_update(Request $request , $id){

        $user = Department::find($id);
        $user->department_name = trim($request->department_name);
        $user->manager_id = trim($request->manager_id);
        $user->locations_id = trim($request->location_id);

        $user->save();

        return redirect('admin/departments')->with('success' , 'Department has been updated..');
    }

    public function delete($id){
        $user = Department::find($id);
        $user->delete();

        return redirect('admin/departments')->with('success' , 'Department has been deleted..');
    }
}
