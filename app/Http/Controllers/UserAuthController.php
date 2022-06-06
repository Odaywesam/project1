<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function ShowLogin($guard){
        return response()->view('master.auth.login' , compact('guard'));

    }


    public function Login(Request $request){
        $validate = Validator($request->all(),[
            'email'=>'required|unique|email|string',
            'password'=>'required|string|min:6|max:16'
        ]);


        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        if (! $validator->fails()) {
            if (Auth::guard($request->get('guard'))->attempt($credentials, $request->get('remember'))) {
                return response()->json(['icon' => 'success', 'title' => 'Login successflly'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Login failed '], 400);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }


    }
    public function Logout(Request $request){
        Auth::guard()->Logout();
        $request->session()->invalidate();
        redirect()->route('view.login' , 'guard');
    }
}
