<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index(Request $request){

        $data['getRecord'] = Region::getRecord($request);
        return view('backend.regions.list' , $data);

    }

    public function  add(){
        return view('backend.regions.add');
    }

    public function  add_post(Request $request){

        $user = request()->validate([
            'region' => 'required'
        ]);

        $user = new Region;
        $user->region_name = trim($request->region);

        $user->save();

        return redirect('admin/regions')->with('success' , 'Region has been added Successfully.');
    }

    public function edit($id){

        $data['getRecord'] = Region::find($id);
        return view('backend.regions.edit' , $data);
    }

    public function edit_update($id, Request $request){
        $user = Region::find($id);

        $user->region_name = trim($request->region);
        $user->save();

        return redirect('admin/regions')->with('success' , 'Region has been updated Successfully..');
    }

    public function delete($id){
        $user = Region::find($id);
        $user->delete();

        return redirect('admin/regions')->with('success' , 'Region has been deleted..');
    }


}
