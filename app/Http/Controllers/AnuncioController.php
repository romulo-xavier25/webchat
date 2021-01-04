<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    public function index()
    {
        return view('paginas.anuncio', compact('user'));
    }

    public function cadastrarAnuncio()
    {
        //
    }
}
