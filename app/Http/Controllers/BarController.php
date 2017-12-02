<?php

namespace App\Http\Controllers;
use App\Bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarController extends Controller
{
    public function getHome()
    {
        return view('osm.query');
    }

    public function getBarByKeyword(Request $request)
    {

        $bars = Bar::search($request->get('keywords'))->get();
        return response()->json(array($bars),200);

    }


}
