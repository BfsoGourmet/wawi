<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;

class SeasonController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $seasons = Season::paginate(15);
        return view('seasons.index', ['seasons' => $seasons]);
    }

    /**
     * @return View
     */
    public function create()
    {
        $seasons = Season::get();
        return view('seasons.create',['seasons'=>$seasons]);
    }

    /**
     * @param SeasonRequest $request
     * @return Redirector
     */
    public function store(SeasonRequest $request)
    {

        $season = new Product();
        $season->name = $request->name;
        $season->date_from = "sku";
        $season->is_live = 0;
        $season->short_desc = "";
        $season->long_desc = "";
        $season->courir_id = 1;
        $season->stock_count = 0;
        $season->price = $request->price;
        $season->calories = $request->kalorien;
        $season->sugar = $request->zucker;
        $season->declaration = "";
        $season->producer_id = 1;
        $season->category_id = $request->category;
        $season->save();
        return redirect(route('seasons.index'))->withSuccess(__('form.successfully-stored'));
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
