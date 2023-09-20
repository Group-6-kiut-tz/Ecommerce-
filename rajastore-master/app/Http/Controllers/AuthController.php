<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function login(Request $request){

        if($request->method()=='POST'){

                $request->validate([
                    'password' => 'required',
                    'phone' => 'required|max:10 | min:10 |exists:users'
                ]);

                $user = User::where('phone', $request->phone)->first();

                if($user->user_type == "admin")
                {
                    return view('Admin.dashboard');
                }

                if(!Hash::check($request->password,$user->password)){
                    return back()->with('error','password do not match');
                }


                auth()->login($user);

                return redirect()->route('ShopNow');
        }

        return view('auth.login');
    }

    public function register(Request $request){
    if($request->method() == 'POST'){

        $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required|max:10 | min:10 |unique:users'
        ]);

       $user = User::create(
            [
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'user_type' => 'customer'
            ]
        );

        return redirect()->route('login');
    }
        return view('auth.register');
    }


    public function logout(){
        //lgout user
        auth()->logout();
        return redirect()->route('home');
    }

    public function admindashboard()
    {
        return view('Admin.dashboard');
    }


}
