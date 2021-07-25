<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class LikeController extends Controller
{
    public function store(Request $request){
        $like = new Like();
        $like->user_id = session('customer');
        $like->product_id = $request->id;
        $like->like = $request->like;
        $like->save();
        return redirect()->back();
    }


    ////////////////////////////



    function load(Request $request)
    {
     if($request->ajax()){
      if($request->id > 0){
       $data = Product::where('id', '<', $request->id)
          ->orderBy('id', 'DESC')
          ->limit(6)
          ->get();
        }else{
        $data = Product::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        }
        return view('load-data',compact('data'));
     }
    }
}
