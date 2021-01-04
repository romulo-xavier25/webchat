<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvaliarAnuncios;
use Auth;

class AvaliarAnunciosController extends Controller
{
    public function cadastrarAvaliacao(Request $request)
    {
        $user = Auth::user();
        $user_avaliador = new AvaliarAnuncios();
        $user_avaliador->cadastrarAvaliacao($request, $user->id);

        return redirect()
                    ->back();

        //dd($user->nome);
        //dd($request->all());
    }
}
