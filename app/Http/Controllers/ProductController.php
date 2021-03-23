<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('products.index', ['products' => $products]);
    }

    /**
     * @return View
     */
    public function create()
    {
        $categories = Category::get();
        return view('products.create',['categories'=>$categories]);
    }

    public static function getAllProducts()
    {
        return Product::count();
    }
    /**
     * @param ProductRequest $request
     * @return Redirector
     */
    public function store(ProductRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->sku = "sku";
        $product->is_live = 0;
        $product->short_desc = "";
        $product->long_desc = "";
        $product->courir_id = 1;
        $product->stock_count = 0;
        $product->price = $request->price;
        $product->calories = $request->kalorien;
        $product->sugar = $request->zucker;
        $product->declaration = "";
        $product->producer_id = 1;
        $product->category_id = $request->category;
        $product->save();
        return redirect(route('products.index'))->withSuccess(__('form.successfully-stored'));
    }

    /**
     * @param Product $product
     * @return View
     */
    public function show(Product $product)
    {
        return view('products.show',['product'=>$product]);
    }

    /**
     * @param Product $product
     * @return View
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('products.edit',['product'=>$product,'categories'=>$categories]);
    }

    /**
     * @param ProductRequest $request
     * @param Product $product
     * @return Redirector
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->sku = "sku";
        $product->is_live = 0;
        $product->short_desc = "";
        $product->long_desc = "";
        $product->courir_id = 1;
        $product->stock_count = 0;
        $product->price = $request->price;
        $product->calories = $request->kalorien;
        $product->sugar = $request->zucker;
        $product->declaration = "";
        $product->producer_id = 1;
        $product->category_id = $request->category;
        $product->save();
        return redirect(route('products.index'))->withSuccess(__('form.successfully-updated'));
    }

    /**
     * @param Product $product
     * @return Redirector
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'))->withSuccess(__('form.successfully-deleted'));
    }
}
