<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'comment' => 'required|max:500|string',
        ]);

        Reviews::create([
            'user_id' => session('customer'),
            'product_id' => $request->product_id,
            'rating' => $request->rate,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
}
