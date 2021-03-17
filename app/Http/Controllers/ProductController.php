<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Producer;
use App\Models\Season;
use App\Models\Courier;
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
        $seasons = Season::get();
        $couriers = Courier::get();
        $producers = Producer::get();
        return view('products.create',['categories'=>$categories, 'seasons'=>$seasons, 'couriers'=>$couriers,'producers'=>$producers]);
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
        $product->courir_id = $request->courier;
        $product->stock_count = 0;
        $product->price = $request->price;
        $product->season_id = $request->season_id;
        $product->season_price = $request->season_price;
        $product->special_price = $request->special_price;
        $product->special_price_active = $request->special_price_active ? 1 : 0;
        $product->calories = $request->kalorien;
        $product->sugar = $request->zucker;
        $product->declaration = $request->declaration;
        $product->producer_id = $request->producer_id;
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
        $seasons = Season::get();
        $couriers = Courier::get();
        $producers = Producer::get();
        return view('products.edit',['product'=>$product, 'categories'=>$categories, 'seasons'=>$seasons, 'couriers'=>$couriers, 'producers'=>$producers]);
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
        $product->courir_id = $request->courier;
        $product->stock_count = 0;
        $product->price = $request->price;
        $product->season_id = $request->season_id;
        $product->season_price = $request->season_price;
        $product->special_price = $request->special_price;
        $product->special_price_active = $request->special_price_active ? 1 : 0;
        $product->calories = $request->kalorien;
        $product->sugar = $request->zucker;
        $product->declaration = $request->declaration;
        $product->producer_id = $request->producer_id;
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
