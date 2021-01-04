<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Anuncios;
use User;

class AvaliarAnuncios extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nota_avaliacao',
    ];

    public function anuncios()
    {
        return $this->belongsToMany(Anuncios::class);
    }

    public function cadastrarAvaliacao($request, $user)
    {
        if (empty($request->estrela)) {
            return [
                'success' => false,
                'message' => 'Preencha pelo menos uma estrela'
            ];
        }

        $avaliarAnuncio = new AvaliarAnuncios();
        $avaliarAnuncio->anuncio_id = $request->anuncio_id;
        $avaliarAnuncio->avaliador_anuncio_id = $user;
        $avaliarAnuncio->nota_avaliacao = $request->estrela;
        $avaliarAnuncio->comentario = $request->comentario;
        $avaliarAnuncio->save();
    }
}
