<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request) {
        $data = $this->setFilter(Product::query(), $request);
        $catogories = Product::groupBy('category')->pluck('category')->toArray();

        return inertia('Product/Index', [
            'products' => $data,
            'categories' => $catogories,
            'request' => $request->all()
        ]);
    }

    public function setFilter($query, $request) {
        if ($request->has('category') && !empty($request->category)) {
            $query = $query->where('category', '=', $request->category);
        }

        if ($request->has('price') && !empty($request->price) && is_numeric($request->price)) {
            $price = (int)$request->price;
            if ($price >= 1 && $price <= 4) {
                if ($price != 4) {
                    list($min, $max) = $this->getPricesRange($price);
                    $query = $query->where('price', '>=', $min)->where('price', '<=', $max);
                } else {
                    $query = $query->where('price', '>', 1000000);
                }
            }
        }

        return $query->get();
    }

    public function getPricesRange($price) {
        return match($price) {
            1 => [0, 50000],
            2 => [100000, 200000],
            3 => [500000, 1000000]
        };
    }

    public function view ($slug) {
        return inertia('Product/View', [
            'product' => Product::where('slug', $slug)->firstOrFail()
        ]);
    }
}
