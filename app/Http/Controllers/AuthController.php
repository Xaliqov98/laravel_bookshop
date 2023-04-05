<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_index(){
        return view('login');
    }

    public function login_submit(Request $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('books');
        }
        return redirect()->route('login_page')->with('error','Wrong email or password.Try again!');

        
    }
}
