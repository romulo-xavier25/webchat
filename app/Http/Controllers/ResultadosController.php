<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Anuncios;

class ResultadosController extends Controller
{
    private $totalPaginas = 2;

    public function index(Request $request)
    {
        $categorias = DB::table('categorias')->get();

        if(empty($request->all())){
            $anuncios = array();
            $anunciosOrderBy = array();
            return view('paginas.resultado', [
                'categorias'        => $categorias,
                'anuncios'          => $anuncios,
                'anunciosOrderBy'   => $anunciosOrderBy
            ]);
        }

        $anuncios = Anuncios::where('descricao', 'LIKE', "%$request->filtrarEmpresa%")
                            ->orWhere('servicos', 'LIKE', "%$request->filtroLocalidade%")
                            ->where('cidade', 'LIKE', "%$request->filtroLocalidade%")
                            ->where('tipo_de_planos_id', '=', 4)
                            ->inRandomOrder()
                            ->get();

        $anunciosOrderBy = Anuncios::where('descricao', 'LIKE', "%$request->filtrarEmpresa%")
                                    ->orWhere('servicos', 'LIKE', "%$request->filtroLocalidade%")
                                    ->where('cidade', 'LIKE', "%$request->filtroLocalidade%")
                                    ->orderBy('tipo_de_planos_id', 'desc')
                                    ->paginate($this->totalPaginas);

       //dd($request->all());
       //dd($anunciosOrderBy);
       
        return view('paginas.resultado', [
            'categorias'        => $categorias,
            'anuncios'          => $anuncios,
            'anunciosOrderBy'   => $anunciosOrderBy
        ]);
    }
    
}
