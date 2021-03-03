<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Person;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;

class PersonController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $persons = Person::paginate(15);
        return view('persons.index', ['persons' => $persons]);
    }

    /**
     * @return View
     */
    public function create()
    {
        $persons = Category::get();
        return view('persons.create',['categories'=>$categories]);
    }

    /**
     * @param PersonRequest $request
     * @return Redirector
     */
    public function store(PersonRequest $request)
    {
        $person = new Person();
        $person->name = $request->name;
        $person->price = $request->price;
        $person->save();
        $person->categories()->sync($request->categories);
        return redirect(route('persons.index'))->withSuccess(__('form.successfully-stored'));
    }

    /**
     * @param Person $person
     * @return View
     */
    public function show(Person $person)
    {
        return view('persons.show',['person'=>$person]);
    }

    /**
     * @param Person $person
     * @return View
     */
    public function edit(Person $person)
    {
        $categories = Category::get();
        return view('persons.edit',['person'=>person,'categories'=>$categories]);
    }

    /**
     * @param PersonRequest $request
     * @param Person $person
     * @return Redirector
     */
    public function update(PersonRequest $request, Person $person)
    {
        $person->name = $request->name;
        $person->price = $request->price;
        $person->save();
        $person->categories()->sync($request->categories);
        return redirect(route('persons.index'))->withSuccess(__('form.successfully-updated'));
    }

    /**
     * @param Person $person
     * @return Redirector
     * @throws Exception
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect(route('persons.index'))->withSuccess(__('form.successfully-deleted'));
    }
}
