<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarController extends Controller
{
    public function getHome()
    {
        return view('osm.query');
    }

    public function getBarByKeyword(Request $request, $keyword = null)
    {



    }
}
