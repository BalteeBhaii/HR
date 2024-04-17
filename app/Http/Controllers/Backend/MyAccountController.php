<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class MyAccountController extends Controller
{
    public function index(Request $request){

        $data['getRecord'] = User::where('id' , auth()->user()->id)->first();
        return view('backend.my_account.update' , $data);
    }

    public function update(Request $request){

        $request->validate([
            'email' => 'unique:users,email,'.Auth::user()->id
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if(!empty($request->password)){
            $user->password = trim($request->password);
        }


        $user->save();
        return redirect('admin/my_account')->with('success'  , 'Account has been updated..');
    }
}
