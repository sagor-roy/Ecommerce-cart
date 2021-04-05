<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function direct()
    {
        return redirect()->back();
    }


    public function index()
    {
        $check = Cart::where('user_id', session('customer'))->where('session_id', session()->getId())->get();
        if (count($check) > 0) {
            if (session()->has('customer')) {
                $customer = Customer::where('id', '=', session('customer'))->first();
                $data = ['customerInfo' => $customer];
            }
            return view('checkout', compact('check'), $data);
        } else {
            return redirect('/');
        }
    }

    public function success(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email',
            'number' => 'required|max:11|min:11',
            'address' => 'required|string|min:4',
            'city' => 'required|string|min:4',
            'country' => 'required',
            'post_code' => 'required|string',
            'payment' => 'required',
        ]);

        $check = Cart::where('user_id', session('customer'))->where('session_id', session()->getId())->get();
        foreach ($check as $row) {
            $product = Product::where('id', $row->product_id)->first();
                $order_id = Order::insertGetId([
                    'user_id' => session('customer'),
                    'payment' => $request->payment,
                    'subtotal' => $request->subtotal,
                    'discount' => $request->discount,
                    'total' => $request->total,
                    'invoice' => substr(md5(time()), 0, 10),
                    'created_at' => Carbon::now(),
                ]);

                $cart = Cart::where('user_id', session('customer'))->where('session_id', session()->getId())->get();
                foreach ($cart as $carts) {
                    OrderItem::insert([
                        'order_id' => $order_id,
                        'product_id' => $carts->product_id,
                        'qty' => $carts->qty,
                        'created_at' => Carbon::now(),
                    ]);
                    // Product stock decrement when customer order by product.
                    $pro = Product::where('id', $carts->product_id)->first();
                    $update = Product::find($pro->id);
                    $update->stock = $pro->stock - $carts->qty;
                    $update->update();
                }

                Shipping::insert([
                    'order_id' => $order_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'number' => $request->number,
                    'country' => $request->country,
                    'city' => $request->city,
                    'post' => $request->post_code,
                    'address' => $request->address,
                    'created_at' => Carbon::now(),
                ]);

                Cart::where('user_id', session('customer'))->delete();
                if (session('discount')) {
                    session()->pull('discount');
                }

                return view('success');
            }
        }

}
