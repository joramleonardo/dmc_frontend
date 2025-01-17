<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
// use App\Users;

class LoginController extends Controller
{
    public function validateLogin(Request $request){
        $credentials = $request->validate([
            'username'=>['required'],
            'password'=>['required']
        ]);

        if (Auth::attempt($credentials)) {
            return Auth::user();
        }
    }

    public function addRegisteredUsers(Request $request){
        $data = new Users();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->role = $request->role;
        $data->remember_token = $request->remember_token;
        
        $data->save();
    }

    public function validateUser(Request $request){
        // return $request;
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->role == 1 ){ 
                $tokenPermission = 'superadmin';
            }
            else if(Auth::user()->role == 2 ){ 
                $tokenPermission = 'admin';
            }
            else if(Auth::user()->role == 3 ){ 
                $tokenPermission = 'encoder';
            }
            else if(Auth::user()->role == 4 ){ 
                $tokenPermission = 'publisher';
            }
    
            $data = response()->json([
                'user' => Auth::user(),
                'token_scope' => $tokenPermission,
                'status_code' => 200
            ], 200);

            
            Session::put('sessionUserData',  $data);
            return $data;
        }

        return response()->json([
            'status_code' => "invalid credentials"
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function getUserData(){
        return Session::get('sessionUserData');
    }
}
