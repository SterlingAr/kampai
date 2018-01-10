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
    public function index()
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


    public function listBars(Request $request, $keywords = null)
    {
         $node_list = array();

//        $bars = Bar::search($request->get('keywords'))
        $bars = Bar::search('vino')
            ->get();
//            ->each( function ($bar)  {
//                global $node_list;
//
//                \Debugbar::addMessage($bar,'*DEBUGGER* nodes:  ');
//
//                array_push($node_list, $bar->node);
//            });

         $bars->each( function ($bar)  {
                global $node_list;

                \Debugbar::addMessage($bar,'*DEBUGGER* nodes:  ');

                array_push($node_list, $bar->node);
            });

        \Debugbar::addMessage($node_list,'*DEBUGGER* nodes:  ');

        \Debugbar::addMessage($bars,'*DEBUGGER* nodes:  ');



        // Devolver los bares que coinciden en ambos arrays.
//        return BarResource::collection($bars);
        return 'Test';

    }







}
