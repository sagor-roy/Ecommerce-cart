<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function dashboard(){

        if(session()->has('admin')){
            return view('admin.index');
        }


    }



    public function check(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:6',
        ]);

        $admin = User::where('email', '=', $request->email)->first();
        if($admin){
            if(Hash::check($request->password,$admin->password)){
                session()->put('admin',$admin->id);
                return redirect('admin/dashboard');
            }else{
                session()->flash('type','danger');
                session()->flash('message','Invalid password');
                return redirect()->back();
            }
        }else{
            session()->flash('type','danger');
            session()->flash('message','No account found on this email');
            return redirect()->back();
        }

    }

    public function logout(){
        if(session()->has('admin')){
            session()->pull('admin');
            return redirect('admin/login');
        }
    }
}
