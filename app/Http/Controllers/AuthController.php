<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registration(){
        return view('auth.reg');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function create(Request $request){
        $request->validate([
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'unique:users,email'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);
        //dd($user);
        Auth::login($user);
        return redirect()->route('show');

    }
    public function showLogin()
    {
        return view('auth.login');
    }

    public function usershow($id){
            $user = User::find($id);

            if($user == null)
                return redirect('/')->with('success', 'Error user-id');
            Auth::login($user);
            //->sendLoginLink()
            //session()->flash('success', true);
            return view('user.user',['user' => auth()->user()]);



    }

    public function usershowpost(Request $request){
        return redirect()->route('user', $request->name);
    }
}
