<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function increasePrice() {
        $products = Product::get();

        foreach ($products as $product){
            $product->price = $product->price + 1;
            $product->save();
        }

        return view('products.index',['products'=>$products]);
    }
}
