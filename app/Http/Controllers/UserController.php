<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create (){
        return view('user.create');
    }
    public function store (Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users|email',
            'password'=>'required|confirmed',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        session()->flash('success','Регистрация пройдена');
        Auth::login($user);
        return redirect()->home();
    }
    public function LoginForm (){
        return view('user.login');
    }
    public function Login (Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,])){
            session()->flash('success', 'You are login');
            if(Auth::user()->is_admin){
                return redirect()->route('admin.index');
            }else{
                return redirect()->home();
            }
        }
        return redirect()->back()->with('error','incorrect login or password');
    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('login.create');
    }
}







