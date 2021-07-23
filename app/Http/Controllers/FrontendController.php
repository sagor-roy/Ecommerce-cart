<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reviews;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        $product = Product::where('status','active')->paginate(16);
        $before = Product::where('status','active')->latest()->limit(4)->get();
        $after = Product::where('status','active')->latest()->skip(4)->take(4)->get();
        return view('index',compact('product','before','after'));
    }

    public function adminLogin(){
        return view('admin.login.login');
    }

    public function register(){
        return view('registration');
    }

    public function login(){
        return view('login');
    }

    public function detail($slug){
        if(Product::where('slug','=', $slug)->first()){
            $product = Product::where('slug',$slug)->first();
            $reviews = Reviews::where('product_id',$product->id)->get();
            $total = Reviews::all()->where('product_id',$product->id)->sum(function ($t){
                return $t->rating;
            });
            if (count($reviews) < 1){
                $result = 1;
            }else{
                $result = count($reviews);
            }
            $gtotal = $total/$result;
            $detail = Product::where('slug',$slug)->get();
            return view('detail',compact('detail','reviews','gtotal'));
        }else{
            return redirect()->back();
        }
    }


    public function commentList($id) {
        $reviews = DB::table('reviews')
            ->join('customers','reviews.user_id','customers.id')
            ->where('product_id',$id)
            ->get();
        $total = Reviews::all()->where('product_id',$id)->sum(function ($t){
            return $t->rating;
        });
        if (count($reviews) < 1){
            $result = 1;
        }else{
            $result = count($reviews);
        }
        $t = $total/$result;
        $gtotal = round($t,1);
        $x = count($reviews);
        return response()->json([
            'review' => $reviews,
            'gtotal' => $gtotal,
            'total' => $x
        ]);
    }
}
