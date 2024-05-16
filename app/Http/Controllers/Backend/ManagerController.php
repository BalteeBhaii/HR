<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager;

class ManagerController extends Controller
{
    public function index(Request $request){
        $data['getRecord']  = Manager::get();
        return view('backend.manager.list' , $data);
    }

    public function add(){
        return view('backend.manager.add');
    }

    public function add_post(Request $request){

        $user = request()->validate([
            'manager_name' => 'required',
            'manager_email' => 'required',
            'manager_mobile' => 'required'
        ]);

        $user = new Manager;

        $user->manager_name = trim($request->manager_name);
        $user->manager_email = trim($request->manager_email);
        $user->manager_number= trim($request->manager_mobile);

        $user->save();

        return redirect('admin/manager')->with('success' , 'Manager addedd successfully..');
    }

    public function edit($id){
        $data['getRecord'] = Manager::find($id);
        return view('backend.manager.edit' , $data);
    }

    public function edit_post(Request $request , $id){
        $user = Manager::find($id);
        $user->manager_name = trim($request->manager_name);
        $user->manager_email = trim($request->manager_email);
        $user->manager_number = trim($request->manager_mobile);

        $user->save();

        return redirect('admin/manager')->with('success' , 'Manager updated successfully..');
    }

    public function delete($id){
        $user = Manager::find($id);
        $user->delete();

        return redirect('admin/manager')->with('success' , 'Manager deleted Successfully..');
    }
}
