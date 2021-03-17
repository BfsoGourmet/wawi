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
        $season->season = $request->name;
        $season->date_from = $request->date_from;
        $season->date_to = $request->date_to;
        $season->create_at = date();
        $season->update_at = date();
        $season->save();
        return redirect(route('seasons.index'))->withSuccess(__('form.successfully-stored'));
    }

    /**
     * @param Season $season
     * @return View
     */
    public function show(Season $season)
    {
        return view('seasons.show',['season'=>$season]);
    }

    /**
     * @param Season $season
     * @return View
     */
    public function edit(Season $season)
    {
        return view('seasons.edit',['season'=>$season]);
    }

    /**
     * @param SeasonRequest $request
     * @param Season $season
     * @return Redirector
     */
    public function update(SeasonRequest $request, Season $season)
    {
        $season->season = $request->name;
        $season->date_from = $request->date_from;
        $season->date_to = $request->date_to;
        $season->update_at = date();
        $season->save();
        return redirect(route('seasons.index'))->withSuccess(__('form.successfully-updated'));
    }

    /**
     * @param Season $season
     * @return Redirector
     * @throws Exception
     */
    public function destroy(Season $season)
    {
        $season->delete();
        return redirect(route('products.index'))->withSuccess(__('form.successfully-deleted'));
    }
}
