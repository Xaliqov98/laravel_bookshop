<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{

    public function signin_index(){
        return view('signin');
    }

    public function signup(Request $request){

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();


        return view('login');
    }
}
