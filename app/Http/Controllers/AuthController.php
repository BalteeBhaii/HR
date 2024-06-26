<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request){

        return view('login');
    }

    public function forgot_password(Request $request){

        return view('forgot_password');
    }

    public function register(Request $request){

        return view('register');
    }

    public function register_post(Request $request){

        $user  = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();
        return redirect('/')->with('success' , 'Register Successfully.');
    }

    public function CheckEmail(Request $request){

        $email = $request->input('email');
        $isExists = User::where('email',  $email)->first();

        if($isExists){
            return response()->json(['exists' => true]);
        }
        return response()->json(['exists' => false]);
    }

    public function login_post(Request $request){

        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        //     if(Auth::User()->is_role == '1'){
        //         return redirect()->intended('admin/dashboard');
        //     }else{
        //         return redirect('/')->with('error', 'No HR avialable...');
        //     }
        // }else{
        //     return redirect()->back()->with('error', 'Invalid login credentials..');
        // }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

                    return redirect()->intended('admin/dashboard');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/'));
    }
}
