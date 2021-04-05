<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartConrtroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check = Cart::where('session_id',session()->getId())->where('user_id',session('customer'))->get();
        if (count($check) > 0){
            $product = Cart::where('session_id',session()->getId())->where('user_id',session('customer'))->get();
            return view('cart',compact('product'));
        }else{
            if (session('discount')) {
                session()->pull('discount');
            }
            return redirect('/');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id  = $request->product_id;
        $pro = Product::where('id',$id)->first();
        if ($pro->discount == null){
            $price = $pro->price;
        }else{
            $price = $pro->price - $pro->discount * $pro->price / 100;
        }

        $check = Cart::where('product_id',$id)->where('session_id',session()->getId())->where('user_id',session('customer'))->first();
        if ($check){
            return redirect()->back();
        }else{
            Cart::insert([
                'user_id' => session('customer'),
                'product_id' => $id,
                'qty' => 1,
                'price' => $price,
                'session_id' => session()->getId(),
                'created_at' => Carbon::now(),
            ]);
            return response()->json();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $id  = $request->id;
        $pro = Product::where('id',$id)->first();
        if ($pro->discount == null){
            $price = $pro->price;
        }else{
            $price = $pro->price - $pro->discount * $pro->price / 100;
        }

        $check = Cart::where('product_id',$id)->where('session_id',session()->getId())->where('user_id',session('customer'))->first();
        if ($check){
            return redirect()->back();
        }else{
            Cart::insert([
                'user_id' => session('customer'),
                'product_id' => $id,
                'qty' => $request->qty,
                'price' => $price,
                'session_id' => session()->getId(),
                'created_at' => Carbon::now(),
            ]);
            return response()->json([
                'message' => 'Product Added'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        if ($product->stock < $request->qty){
            session()->flash('messages','We have stock '.$product->stock.' product (code = '.$product->code.')');
            return redirect()->back();
        }else{
            $cart = Cart::where('id',$request->id)->first();
            $cart->qty = $request->qty;
            $cart->update();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::where('id',$id)->delete();
        return redirect()->back();
    }

    public function cartShow(){
        $data = Cart::all()->where('user_id',session('customer'))->where('session_id',session()->getId())->sum(function ($t){
            return $t->price * $t->qty;
        });
        $qty = Cart::all()->where('user_id',session('customer'))->where('session_id',session()->getId())->sum('qty');
        return response()->json([
            'total' => $data,
            'qty' => $qty
        ]);
    }
}
