<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bar;
use App\Http\Resources\BarResource;

class BarController extends Controller
{

    /**
     * Return a paginated list of bars
     *
     * @return BarResource
     */
    public function index()
    {
//        $bars = Bar::search($request->get('keywords'))->get();
        $bars = Bar::all();
        return BarResource::collection($bars);

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Bar  $bar
     * @return \App\Bar  $bar
     */
    public function show(Bar $bar)
    {

        return new BarResource($bar);
    }

    public function listBars(Request $request, $keywords = null)
    {
        $bars = Bar::search($request->get('keywords'))->get();

         return BarResource::collection($bars);

    }

}
