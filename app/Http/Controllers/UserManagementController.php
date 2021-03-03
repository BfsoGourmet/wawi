<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UserManagementController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('users.index', ['users' => $users]);
    }

    /**
     * @return View
     */
    public function create()
    {
        $user = User::get();
        return view('users.create',['user'=>$user]);
    }

    /**
     * @param ProductRequest $request
     * @return Redirector
     */
    public function store(ProductRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->price = $request->price;
        $user->save();
        $user->categories()->sync($request->categories);
        return redirect(route('products.index'))->withSuccess(__('form.successfully-stored'));
    }

    /**
     * @param Product $product
     * @return View
     */
    public function show(User $user)
    {
        return view('users.show',['user'=>$user]);
    }

    /**
     * @param Product $product
     * @return View
     */
    public function edit(User $product)
    {
        $categories = Category::get();
        return view('users.edit',['product'=>$product,'categories'=>$categories]);
    }

    /**
     * @param ProductRequest $request
     * @param Product $product
     * @return Redirector
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        $product->categories()->sync($request->categories);
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
        return redirect(route('users.index'))->withSuccess(__('form.successfully-deleted'));
    }
}
