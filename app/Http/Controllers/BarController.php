<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Bar;
class BarController extends Controller

{
    public function getHome()
    {
        return view('osm.query');
    }

    public function getBarByKeyword(Request $request)
    {

        $bars = Bar::search($request->get('keywords'))->get();

        $nodes = [];

        foreach ($bars as $bar)
        {
            array_push($nodes, $bar->node);
        }

        return $nodes;

    }
}
