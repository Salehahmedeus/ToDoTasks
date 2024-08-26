<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $cardentials=request(['phone', 'password']);
        if(!$token=auth()->attempt($cardentials)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL()*60
        ]);
    }
    public function index($id) {

       $users = User::all();
       return response()->json([
           'users' => $users
       ]);


    }


    public function store(Request $request){
        $inputs=$request->validate([
            'name'=>'required','unique',
            'password'=>'required',
            'phone'=>'required','unique',
            'gender'=>'required',
            'DOB'=>'required',
        ]);

        User::create([
            'name'=>$inputs['name'],
            'password'=>Hash::make($inputs['password']),
            'phone'=>$inputs['phone'],
            'avatar_url' => $input['avatar_url'] ?? null,
            'gender'=>$inputs['gender'],
            'DOB'=>$inputs['DOB'],



        ]);
        return response()->json([
           'date'=>'user has been registered successfully ' ,
        ]);
    }

}
