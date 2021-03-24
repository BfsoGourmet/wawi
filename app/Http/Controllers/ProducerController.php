<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducerRequest;
use App\Models\Producer;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;

class ProducerController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $producers = producer::paginate(15);
        return view('producers.index', ['producers' => $producers]);
    }

    public static function getAllProducers()
    {
        return Producer::count();
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('producers.create');
    }

    /**
     * @param ProducerRequest $request
     * @return Redirector
     */
    public function store(ProducerRequest $request)
    {
        $producer = new Producer();
        $producer->company = $request->company;
        $producer->contact_firstname = $request->contact_firstname;
        $producer->contact_lastname = $request->contact_lastname;
        $producer->contact_phone = $request->contact_phone;
        $producer->save();
        return redirect(route('producers.index'))->withSuccess(__('form.successfully-stored'));
    }

    /**
     * @param Producer $producer
     * @return View
     */
    public function show(Producer $producer)
    {
        return view('producers.show',['producer'=>$producer]);
    }

    /**
     * @param Producer $producer
     * @return View
     */
    public function edit(Producer $producer)
    {
        return view('producers.edit',['producer'=>$producer]);
    }

    /**
     * @param ProducerRequest $request
     * @param Producer $producer
     * @return Redirector
     */
    public function update(ProducerRequest $request, Producer $producer)
    {
        $producer->company = $request->company;
        $producer->contact_firstname = $request->contact_firstname;
        $producer->contact_lastname = $request->contact_lastname;
        $producer->contact_phone = $request->contact_phone;
        $producer->save();
        return redirect(route('producers.index'))->withSuccess(__('form.successfully-updated'));
    }

    /**
     * @param Producer $producer
     * @return Redirector
     * @throws Exception
     */
    public function destroy(Producer $producer)
    {
        $producer->delete();
        return redirect(route('producers.index'))->withSuccess(__('form.successfully-deleted'));
    }
}
