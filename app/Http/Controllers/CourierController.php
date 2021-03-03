<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourierRequest;
use App\Models\Courier;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;

class CourierController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $couriers = courier::paginate(15);
        return view('couriers.index', ['couriers' => $couriers]);
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('couriers.create');
    }

    /**
     * @param CourierRequest $request
     * @return Redirector
     */
    public function store(CourierRequest $request)
    {
        $courier = new Courier();
        $courier->firstname = $request->firstname;
        $courier->lastname = $request->lastname;
        $courier->phone = $request->phone;
        $courier->save();
        return redirect(route('couriers.index'))->withSuccess(__('form.successfully-stored'));
    }

    /**
     * @param Courier $courier
     * @return View
     */
    public function show(Courier $courier)
    {
        return view('couriers.show',['courier'=>$courier]);
    }

    /**
     * @param Courier $courier
     * @return View
     */
    public function edit(Courier $courier)
    {
        return view('couriers.edit',['courier'=>$courier]);
    }

    /**
     * @param CourierRequest $request
     * @param Courier $courier
     * @return Redirector
     */
    public function update(CourierRequest $request, Courier $courier)
    {
        $courier->firstname = $request->firstname;
        $courier->lastname = $request->lastname;
        $courier->phone = $request->phone;
        $courier->save();
        return redirect(route('couriers.index'))->withSuccess(__('form.successfully-updated'));
    }

    /**
     * @param Courier $courier
     * @return Redirector
     * @throws Exception
     */
    public function destroy(Courier $courier)
    {
        $courier->delete();
        return redirect(route('couriers.index'))->withSuccess(__('form.successfully-deleted'));
    }
}
