<?php

namespace App\Http\Controllers\Api\Bar;

use App\Bar;
use Illuminate\Http\Response as HttpResponse;

use App\Providers\OsmServiceProvider;
use App\Http\Services\Osm\OsmServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BarResource;
use Mockery\CountValidator\Exception;

class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bars = Bar::all();

        return BarResource::collection($bars);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bar  $bar
     * @return \Illuminate\Http\Response
     */
    public function show(Bar $bar)
    {

//        \Debugbar::addMessage($bar, '*DEBUGGER* Bar Object in BarController@show');
        return new BarResource($bar);


    }



    public function listBars(OsmServiceInterface $osm_service, $keywords = 'all', $bbox)
    {
        $bars = 'If you see this, everything failed!';

        try
        {

            if($keywords != '' && $keywords != 'all')
            {

                if($bbox == null || $bbox == '')
                {
                    throw new \Mockery\Exception('<bbox> cannot be empty.');
                }


                $node_list = array();
                $bars = Bar::search($keywords)->get();

                if($bars->isEmpty())
                {
                    return response()->json([
                        'status' => 'Nothing found'
                    ], HttpResponse::HTTP_NOT_FOUND);
                }

                foreach ($bars as $bar)
                {
                    array_push($node_list, $bar->node);
                }
                $bars = $osm_service->retrieve_osm_data($node_list,$bbox);
//                var_dump($bars);
                $features = $osm_service->create_feature_collection(json_decode($bars));
//                var_dump(json_encode($features));


                return response()->json([
                    'bars' => json_decode($bars),
                    'features' => $features
                ],HttpResponse::HTTP_OK);
            }


        }
        catch (Exception $e)
        {

        }

        $bars = $osm_service->retrieve_all_osm_data($bbox);
        $features = $osm_service->create_feature_collection(json_decode($bars));


        return response()->json([
            'bars' => json_decode($bars->elements),
            'features' => $features
        ],HttpResponse::HTTP_OK);
    }




}
