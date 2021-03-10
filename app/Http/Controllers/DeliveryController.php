<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;

class DeliveryController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $deliveries = delivery::paginate(15);
        return view('deliveries.index', ['deliveries' => $deliveries]);
    }

    /**
     * @param Delivery $delivery
     * @return View
     */
    public function edit(Delivery $delivery)
    {
        return view('deliveries.edit',['delivery'=>$delivery]);
    }

    /**
     * @param DeliveryRequest $request
     * @param Delivery $delivery
     * @return Redirector
     */
    public function update(DeliveryRequest $request, Delivery $delivery)
    {
        $delivery->customer_firstname = $request->customer_firstname;
        $delivery->customer_lastname = $request->customer_lastname;
        $delivery->delivery_address = $request->delivery_address;
        $delivery->delivery_zip = $request->delivery_zip;
        $delivery->delivery_place = $request->delivery_place;
        $delivery->delivery_country = $request->delivery_country;
        $delivery->courier_id = $request->courier_id;
        $delivery->save();
        return redirect(route('deliveries.index'))->withSuccess(__('form.successfully-updated'));
    }

    /**
     * @param Delivery $delivery
     * @return Redirector
     * @throws Exception
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect(route('deliveries.index'))->withSuccess(__('form.successfully-deleted'));
    }
}
