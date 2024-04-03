<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Region;

class CountryController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = Country::get();
        return view('backend.country.list' , $data);
    }

    public function add(){
        $data['getRecord'] = Region::get();
        return view('backend.country.add' ,$data);
    }

    public function add_post(Request $request){
        $user = request()->validate([
            'country'=>'required',
            'region_id' => 'required'
        ]);

        $user = new Country;

        $user->country_name  =trim($request->country);
        $user->region_id = trim($request->region_id);
        $user->save();

        return redirect('admin/countries')->with('success' , 'Record has been added successfully.');
    }

    public function edit($id){
        $data['getRecord'] = Country::find($id);
        $data['getRegion'] = Region::get();

        return view('backend.country.edit' , $data);
    }

    public function edit_update($id, Request $request){
        $user = Country::find($id);
        $user->country_name = $request->country_name;
        $user->region_id = $request->region_id;

        $user->save();

        return redirect('admin/countries')->with('success' ,'Record has been Updatedd.');

    }

    public function delete($id){
        $user = Country::find($id);
        $user->delete();

        return redirect('admin/countries')->with('success' , 'Record has been deleted..');
    }
}
