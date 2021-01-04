<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use User;
use Categoria;
use TipoDePlano;
use AvaliarAnuncios;

class Anuncios extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logotipo', 'nome_da_empresa', 'descricao', 'servicos', 'cpf', 'cnpj', 
        'telefone_principal', 'endereco', 'numero', 'cidade', 'estado', 'bairro',
    ];

    public function categoria()
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function tipoDePlano()
    {
        return $this->hasMany(TipoDePlano::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function avaliarAnuncios()
    {
        return $this->hasMany(AvaliarAnuncios::class);
    }

    public function cadastrarAnuncio($request, $user)
    {
        try{
            $foto_perfil_anuncio = $request->fotoPerfil;
            if($request->hasFile('fotoPerfil') && $request->file('fotoPerfil')->isValid()){
                // Get filename with the extension
                $filenameWithExt = $request->file('fotoPerfil')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('fotoPerfil')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('fotoPerfil')->storeAs('public/upload', $fileNameToStore);
                $foto_perfil_anuncio = $fileNameToStore;
                //dd($data);
            } else {
                $fileNameToStore = 'noimage.png';
            }
            //relacionamento entre anuncio e tipo de plano
        $cadastrar_anuncio = new Anuncios();
        $cadastrar_anuncio->user_id = $user->id;
        $cadastrar_anuncio->tipo_de_planos_id = 1;
        $cadastrar_anuncio->logotipo = $foto_perfil_anuncio;
        $cadastrar_anuncio->fotoCapa = "";
        $cadastrar_anuncio->nome_da_empresa = $request->nome;
        $cadastrar_anuncio->descricao = $request->descricao;
        $cadastrar_anuncio->servicos = $request->servicos;

        $cfpCnpj = $this->limpaCPF_CNPJ($request->cpfcnpj);

        if (strlen($cfpCnpj) == 11) {
            $cadastrar_anuncio->cpf = $request->cpfcnpj;
            $cadastrar_anuncio->cnpj = "";
        }

        if (strlen($cfpCnpj) == 14) {
            $cadastrar_anuncio->cpf = "";
            $cadastrar_anuncio->cnpj = $request->cpfcnpj;
        }
        
        $cadastrar_anuncio->telefone_principal = $request->telefonePrincipal;
        $cadastrar_anuncio->telefone_adicional = $request->telefoneAdicional;
        $cadastrar_anuncio->endereco = $request->endereco;
        $cadastrar_anuncio->numero = $request->numeroResidencia;
        $cadastrar_anuncio->complemento = $request->complemento;
        $cadastrar_anuncio->bairro = $request->bairro;
        $cadastrar_anuncio->cidade = $request->cidade;
        $cadastrar_anuncio->estado = $request->estado;
        $cadastrar_anuncio->cep = $request->cep;
        
        $cadastrar_anuncio->link_facebook = "";
        $cadastrar_anuncio->link_twitter = "";
        $cadastrar_anuncio->link_youtube = "";
        $cadastrar_anuncio->link_site = "";
        $cadastrar_anuncio->link_instagram = "";
        $cadastrar_anuncio->link_linkedin = "";
        $cadastrar_anuncio->telefone_whatsapp = "";
        $cadastrar_anuncio->email = "";

        $cadastrar_anuncio->domingo_abre = "";
        $cadastrar_anuncio->domingo_fecha = "";
        $cadastrar_anuncio->segunda_abre = "";
        $cadastrar_anuncio->segunda_fecha = "";
        $cadastrar_anuncio->terca_abre = "";
        $cadastrar_anuncio->terca_fecha = "";
        $cadastrar_anuncio->quarta_abre = "";
        $cadastrar_anuncio->quarta_fecha = "";
        $cadastrar_anuncio->quinta_abre = "";
        $cadastrar_anuncio->quinta_fecha = "";
        $cadastrar_anuncio->sexta_abre = "";
        $cadastrar_anuncio->sexta_fecha = "";
        $cadastrar_anuncio->sabado_abre = "";
        $cadastrar_anuncio->sabado_fecha = "";

        //criando slug do anuncio
        $cadastrar_anuncio->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->nome)));

        $cadastrar_anuncio->save();

        $this->inserirAnuncioCategoria($request, $cadastrar_anuncio);

        return [
            'success' => true,
            'message' => 'Anuncio cadastrado com sucesso!'
        ];

        }catch(\Exception $e){
            return [
                'success' => false,
                'message' => 'Erro ao cadastrar anuncio'
            ];
        }
    }

    public function inserirAnuncioCategoria(Request $request, Anuncios $anuncio)
    {
        return DB::insert('insert into anuncio_categoria (anuncio_id, categoria_id) values (?, ?)', [$anuncio->id, $request->categorias]);
    }

    public function editarAnuncio(Request $request, $user)
    {
        $data = $request->all();
        $array_anuncio = array($request->cpfcnpj, $request->cpfcnpj);
        $select_anuncio = DB::select('select * from anuncios where cpf = ? OR cnpj = ?', $array_anuncio);

        $anuncio = $this->findOrFail($select_anuncio[0]->id);

        try{
            if($request->hasFile('fotoPerfil') && $request->file('fotoPerfil')->isValid()){
                // Get filename with the extension
                $filenameWithExt = $request->file('fotoPerfil')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('fotoPerfil')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('fotoPerfil')->storeAs('public/upload', $fileNameToStore);
                $data['logotipo'] = $fileNameToStore;
                //dd($data);
            } else {
                $fileNameToStore = 'noimage.png';
            }
            //criando slug do anuncio
            $data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->nome)));

            $anuncio->update($data);

            return [
                'success' => true,
                'message' => 'Anuncio atualizado com sucesso!'
            ];

        } catch(\Exception $e) {
            return [
                'success' => false,
                'message' => 'Erro ao cadastrar um anuncio!'
            ];
        }
    }

    public function inserirAnuncioTiposDePlano(Anuncios $anuncio)
    {
        //
    }

    public function limpaCPF_CNPJ($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        return $valor;
    }

}
