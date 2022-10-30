<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('register.index');
    }
    public function loginIndex(){
        return view('login.index');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return redirect('/member');
    }
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        // check email
        $user = User::where('email', $fields['email'])->first();

        // check password
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return back();
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return redirect('/member');
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return redirect('/loginIndex');
    }
}
