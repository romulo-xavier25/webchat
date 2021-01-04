<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Anuncios;
use Auth;

class MeusAnunciosController extends Controller
{
    public function index()
    {

        $categorias = DB::table('categorias')->get();
        $tipo_de_anuncio = 1;
        return view('paginas.cadastrar_anuncio', compact('categorias', 'tipo_de_anuncio'));
    }

    public function meusAnuncios()
    {
        $anuncios = Auth::user()->anuncios()->get();

        $users_avaliador_anuncio = DB::table('users')
                                            ->join('avaliar_anuncios', 'users.id', '=', 'avaliar_anuncios.avaliador_anuncio_id')
                                            ->select('users.*', 'avaliar_anuncios.*')
                                            ->get();

        $user_avaliador_anuncio_especifico = array();

        for($i = 0; $i < count($users_avaliador_anuncio); $i++){
            if ($users_avaliador_anuncio[$i]->anuncio_id == $anuncio->id){
                $user_avaliador_anuncio_especifico[$i] = $users_avaliador_anuncio[$i];
            }
        }

        $users_avaliador_anuncio = $user_avaliador_anuncio_especifico;

        return view('paginas.meus_anuncios', compact('anuncios', 'users_avaliador_anuncio'));
    }

    public function cadastrarAnuncio(Request $request)
    {
        $user = Auth::user();
        $cadastrar_anuncio = new Anuncios();
        $response = $cadastrar_anuncio->cadastrarAnuncio($request, $user);

        if ($response['success'])
            return redirect()
                        ->route('cadastrar-anuncio')
                        ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);

    }

    public function atualizarAnuncio(Request $request)
    {
        $user = Auth::user();
        $editar_anuncio = new Anuncios();
        $response = $editar_anuncio->editarAnuncio($request, $user);

        if ($response['success'])
            return redirect()
                        ->route('meus-anuncios')
                        ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
        dd($request->all());
    }

}
