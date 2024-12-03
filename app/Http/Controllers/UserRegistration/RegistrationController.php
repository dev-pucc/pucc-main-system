<?php

namespace App\Http\Controllers\UserRegistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    //function for displaying registration form
    public function register(){

        return view('user_registration.register');
    }



    //function for storing registration data
    public function registerProcess(Request $request){


        //checking validation of input fields
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'email|required|unique:users',
            'mobile' => 'required|numeric|digits:11|unique:users',
            'role'=>'required',
            'club_id'=>'required|numeric|unique:users',
            'division'=>'required',
            'password'=> 'required|min:8',
        ],[
            'club_id.unique'=>'This student id is already registered.',
            'club_id.required'=>'student id is required.',
            'club_id.numeric'=>'student id must be a number.',
        ]);


        //if validation passes then data will be stored in database
        if($validator->passes()){

            DB::table('users')->insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'role'=>$request->role,
                'division'=>$request->division,
                'club_id'=>$request->club_id,
                'password'=>Hash::make($request->password),
            ]);

            
            return redirect()
                    ->route('user_registration.register')
                    ->with('success','User created successfully.Awaiting admin approval.');
            
        }else{

            //if validation fails then it will return back with errors
            return redirect()
                    ->route('user_registration.register')
                    ->withErrors($validator)
                    ->withInput($request->only('name','email', 'mobile','club_id','role','division'));

        }
    }
}
