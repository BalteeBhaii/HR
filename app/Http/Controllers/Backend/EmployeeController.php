<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeJob;
use App\Models\Manager;
use App\Models\Department;
use Str;
use Spatie\Permission\Models\Role;
use Hash;



class EmployeeController extends Controller
{

    public function index(Request $request){

         $data['getRecord'] = User::getRecord();
        return view('backend.employees.list', $data);

    }

    public function add(Request $request){

        $data['getJobs'] = EmployeeJob::get();
        $data['getManager'] = Manager::get();
        $data['getDepartment']  = Department::get();
        $data['roles'] = Role::pluck('name','name')->all();

        return view('backend.employees.add' ,$data);
    }

    public function add_post(Request $request){

        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commission_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',
            'roles' => 'required'
        ]);


        $user  = new User;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email  = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = $request->hire_date;
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id  = trim($request->department_id);
        // $user->is_role = 0;//employees
        $user->password = Hash::make($request->password);


        if(!empty($request->profile_image)){

            $file = $request->file('profile_image');
            $randomStr  = Str::random(30);
            $fileName  = $randomStr.'.' .$file->getClientOriginalExtension();
            $file->move('upload/',$fileName);
            $user->profile_image =  $fileName;
        }

        $user->save();
        $user->syncRoles($request->roles);

        return redirect('admin/employees')->with('success', 'Employee has been added Successfully.');

    }

    public function view($id){

        $data['getRecord'] = User::find($id);
        return view('backend.employees.view' , $data);
    }

    public function edit($id){

         $data['getRecord'] = User::find($id);
        $data['getJobs'] = EmployeeJob::get();
        $data['getManager'] = Manager::get();
        $data['getDepartment'] = Department::get();
        $data['roles'] = Role::pluck('name','name')->all();
        $data['userRoles'] = $data['getRecord']->roles->pluck('name','name')->all();

        return view('backend.employees.edit', $data);
    }

    public function edit_update($id, Request $request){


        $user = request()->validate([
            'email' => 'required|unique:users,email,'.$id
        ]);

        $user = User::find($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email  = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = $request->hire_date;
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id  = trim($request->department_id);
        // $user->is_role = 0;//employees

        if(!empty($request->file('profile_image'))){
            if(!empty($user->profile_image) && file_exists('upload/'.$user->profile_image)){
                unlink('upload/'.$user->profile_image);
            }

            $file = $request->file('profile_image');
            $strRandom  = Str::random(30);
            $fileName = $strRandom.'.'.$file->getClientOriginalExtension();
            $file->move('upload/',$fileName);
            $user->profile_image = $fileName;
        }
        $user->save();
        $user->syncRoles($request->roles);

        return redirect('admin/employees')->with('success', 'Employee has been updated Successfully.');


    }

    public function delete($id){

        $recordDelete = User::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error' , 'Record Successfully Deleted.');
    }




}
