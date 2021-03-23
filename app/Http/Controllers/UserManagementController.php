<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

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

    public function isAdmin() {
        print_r($_SESSION);
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
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->password = Hash::make($user->password);
        $user->save();
        return redirect(route('users.index'))->withSuccess(__('form.successfully-stored'));
    }

    /**
     * @param Product $product
     * @return View
     */
    public function show(User $user)
    {
        return view('users.show',['user'=>$user]);
    }

    public static function getAllUser()
    {
        return User::count();
    }

    /**
     * @param Product $product
     * @return View
     */
    public function edit(User $user)
    {
        return view('users.edit',['user'=>$user]);
    }

    /**
     * @param ProductRequest $request
     * @param Product $product
     * @return Redirector
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;

            $user->save();
            return redirect(route('users.index'))->withSuccess(__('form.successfully-updated'));
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

    }

    /**
     * @param Product $product
     * @return Redirector
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->withSuccess(__('form.successfully-deleted'));
    }
}
