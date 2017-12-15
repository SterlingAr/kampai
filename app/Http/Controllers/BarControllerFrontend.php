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

}
