<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    public function index()
    {
        return view('paginas.pagamentos');
    }
}
