<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.add-product');
    }

    public function manage(){
        $product = Product::latest()->get();
        return view('admin.product.manage-product',compact('product'));
    }

    public function coupon(){
        return view('admin.coupon.coupon');
    }

    public function order(){
        return view('admin.order.order');
    }

    public function manageorder(){
        return view('admin.order.order_manage');
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
        $request->validate([
            'name' => 'required|string|min:5',
            'desc' => 'required|min:50',
            'stock' => 'required',
            'price' => 'required',
            'status' => 'required',
            'first_image' => 'required|mimes:jpeg,png,jpg,webp',
            'second_image' => 'required|mimes:jpeg,png,jpg,webp',
            'third_image' => 'required|mimes:jpeg,png,jpg,webp',
        ]);

        $first_image = $request->file('first_image');
        $file_name1 = substr(md5(time()), 0, 15).'_01.'.$first_image->getClientOriginalExtension();
        Image::make($first_image)->resize(700,700)->save('uploads/products/'.$file_name1);
        $first_image_output = 'uploads/products/'.$file_name1;
        // SECCOND
        $second_image = $request->file('second_image');
        $file_name2 = substr(md5(time()), 0, 15).'_02.'.$second_image->getClientOriginalExtension();
        Image::make($second_image)->resize(540,560)->save('uploads/products/'.$file_name2);
        $second_image_output = 'uploads/products/'.$file_name2;
        // THIRD
        $third_image = $request->file('third_image');
        $file_name3 = substr(md5(time()), 0, 15).'_03.'.$third_image->getClientOriginalExtension();
        Image::make($third_image)->resize(540,560)->save('uploads/products/'.$file_name3);
        $third_image_output = 'uploads/products/'.$file_name3;

        $prduct = new Product();
        $prduct->name = $request->name;
        $prduct->slug = strtolower(str_replace(' ','-',$request->name));
        $prduct->desc = $request->desc;
        $prduct->code = substr(md5(time()), 0, 10);
        $prduct->stock = $request->stock;
        $prduct->price = $request->price;
        $prduct->discount = $request->discount;
        $prduct->status = $request->status;
        $prduct->f_img = $first_image_output;
        $prduct->s_img = $second_image_output;
        $prduct->t_img = $third_image_output;
        $prduct->created_at = Carbon::now();
        $prduct->save();
        session()->flash('type','success');
        session()->flash('message','Product added succesfull');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
