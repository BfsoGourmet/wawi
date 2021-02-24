<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function increasePrice() {
        Product::increment('price');
        $products = Product::get();
//        foreach ($products as $product){
//            $product->price = $product->price + 1;
//        }
//
//        $products->save();


        return view('products.index',['products'=>$products]);
    }
}
