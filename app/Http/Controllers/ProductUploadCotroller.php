<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductUploadCotroller extends Controller
{
    public function index() {
        return view('product');
    }

    public function store(Request $request) {

            $img = $request->file('img');
            $i = 1;
        for($i=1; $i>10; $i++) {
            return "sagor";
            $i++;
        }
    }
}

