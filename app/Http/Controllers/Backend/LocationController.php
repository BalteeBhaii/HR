<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Country;

class LocationController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = Location::get();
        return view('backend.location.list' , $data);
    }

    public function add(){
       $data['getRecord'] = Country::get();
        return view('backend.location.add',  $data);
    }

    public function add_post(Request $request){
        $user = $request->validate([
            'street_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'state_province' => 'required',
            'country_id' => 'required'
        ]);

        $user = new Location;
        $user->street_address = trim($request->street_address);
        $user->postal_code = trim($request->postal_code);
        $user->city = trim($request->city);
        $user->state_province  = trim($request->state_province);
        $user->countries_id = trim($request->country_id);

        $user->save();

        return redirect('admin/locations')->with('success' ,'Record has been Added..');
    }
}
