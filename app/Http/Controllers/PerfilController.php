<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anuncios;
use Auth;

class PerfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $anuncios = $user->anuncios()->get();

        return view('paginas.perfil', compact('user', 'anuncios'));
    }

    public function atualizarPerfil(Request $request)
    {
        $user = auth()->user();
        $response = $user->atualizarPerfil($request, $user->id);

        if ($response['success'])
            return redirect()
                        ->route('perfil')
                        ->with('success', $response['message']);

        return redirect()
                    ->back('perfil')
                    ->with('error', $response['message']);
    }
}
