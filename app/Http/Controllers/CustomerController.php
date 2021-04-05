<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:customers',
            'number' => 'required|min:11|max:11|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            $register = new Customer();
            $register->name = $request->name;
            $register->email = $request->email;
            $register->number = $request->number;
            $register->password = Hash::make($request->password);
            $register->save();
            session()->flash('type', 'success');
            session()->flash('message', 'Registration Successfull..!!');
        } catch (Exception $error) {
            session()->flash('type', 'danger');
            session()->flash('message', $error->getMessage());
        }
        return redirect()->back();
    }

    public function profile()
    {
        if (session()->has('customer')) {
            $customer = Customer::where('id', '=', session('customer'))->first();
            $data = ['customerInfo' => $customer];
        }
        return view('user_profile', $data);
    }


    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:6',
        ]);

        $customer = Customer::where('email', '=', $request->email)->first();
        if ($customer) {
            if (Hash::check($request->password, $customer->password)) {
                session()->put('customer', $customer->id);
                return redirect('/customer/profile');
            } else {
                session()->flash('type', 'danger');
                session()->flash('message', 'Invalid password');
                return redirect()->back();
            }
        } else {
            session()->flash('type', 'danger');
            session()->flash('message', 'No account found on this email');
            return redirect()->back();
        }

    }

    public function logout()
    {
        if (session()->has('customer')) {
            session()->pull('customer');
        }
        if (session()->has('discount')) {
            session()->pull('discount');
        }
        return redirect('customer/login');

    }

    public function logouts(){
        return redirect()->back();
    }

}
