<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanosController extends Controller
{
    public function index()
    {
        return view('paginas.planos');
    }
}
