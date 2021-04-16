<?php

namespace App\Http\Controllers\EDance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Views\auth; 

class PaginaInicialController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('layouts.menuAdmin');
    }
}