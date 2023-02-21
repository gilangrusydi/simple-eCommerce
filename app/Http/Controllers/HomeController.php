<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() {
        return inertia('Home', [
            'banner' => Banner::all(),
            'product' => Product::all()
        ]);
    }
}
