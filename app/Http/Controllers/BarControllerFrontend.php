<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Bar;
class BarControllerFrontend extends Controller

{
    public function index()
    {
        \Debugbar::addMessage('Ruta iniciada', 'DEBUGGER: Pasó esto.');

        return view('osm.index');
    }


    public function bars()
    {
        return view('osm.tests.bars');
    }


    public function users()
    {
        return view('osm.tests.users');
    }

}
