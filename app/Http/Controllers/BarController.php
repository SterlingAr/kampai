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

    public function getBarByKeyword($keyword = null)
    {

        //$bar = Bar::where('keywords', $keyword);
        $query = '%' . $keyword . '%';
        $bar = DB::table('bars')->where('keywords','like', $query)->get()->first();

//        return view('osm.bar', [
//            'node' => $bar->node,
//            'keywords' => $bar->keywords
//        ]);

        return response()->json(array('node' => $bar->node),200);

    }
}
