<?php

namespace App\Http\Controllers\Api\Bar;

use App\Bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BarResource;
use function MongoDB\BSON\toJSON;

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

        \Debugbar::addMessage($bar, '*DEBUGGER* Bar Object in BarController@show');
        return new BarResource($bar);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bar  $bar
     * @return \Illuminate\Http\Response
     */
    public function edit(Bar $bar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bar  $bar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bar $bar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bar  $bar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bar $bar)
    {
        //
    }


    public function listBars($keywords = null, $bbox)
    {
        $node_list = array();

        $bars = Bar::search($keywords)->get();

        foreach ($bars as $bar)
        {
            array_push($node_list, $bar->node);
        }


        \Debugbar::addMessage($node_list,'*DEBUGGER* node_list:  ');

        \Debugbar::addMessage($bars,'*DEBUGGER* bars:  ');

        \Debugbar::addMessage($bbox,'*DEBUGGER* bbox:  ');

        $response = $this->getDataAttribute($node_list[0]);
        // Devolver los bares que coinciden en ambos arrays.
        return $response;

    }




    public function getDataAttribute($nodes)

    {

        $baseUri = 'https://z.overpass-api.de/api/interpreter?data=';

        $queryStart = '[out:json][timeout:25];(';

        $queryEnd = ');out body;>;out skel qt;';


        $node = 'node(' . (string)$nodes . ')';
        $encodedQuery = urlencode($queryStart . $node . $queryEnd);
        $osmQuery = $baseUri . $encodedQuery ;

        \Debugbar::addMessage($osmQuery,'*DEBUGGER* Encoded Query:  ');
        $headers = array(
            'http' => array(
                'method' => 'GET',
                'header' => "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8" .
                    "Accept-Encoding: gzip, deflate, br" .
                    "Accept-Language:en-US,en;q=0.5" .
                    "Connection: keep-alive" .
                    "Host: z.overpass-api.de" .
                    "Upgrade-Insecure-Requests: 1 " .
                    "User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0"
            )
        );

        $context = stream_context_create($headers);

        $json_response = file_get_contents($osmQuery ,false,$context);

        return $json_response;

    }







}
