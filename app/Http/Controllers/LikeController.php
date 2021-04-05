<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

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
}
