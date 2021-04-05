<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function check(Request $request){
        $request->validate([
            'coupon' => 'required|string'
        ]);

        $check = Coupon::first();
        if ($check->name == $request->coupon){
            session()->put('discount',$check->discount);
            return redirect()->back();
        }else{
            session()->flash('message','Invalid coupon code');
            return redirect()->back();
        }
    }

    public function destroy(){
        if (session()->has('discount')){
            session()->pull('discount');
            return redirect()->back();
        }
    }
}
