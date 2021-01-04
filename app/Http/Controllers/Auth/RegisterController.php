<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::INDEX;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome'                  => ['required', 'string', 'max:15'],
            'identificacao'         => ['required', 'string', 'max:255'],
            'telefone'              => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'endereco'              => ['required', 'string', 'max:255'],
            'numero'                => ['required', 'string', 'max:255'],
            'bairro'                => ['required', 'string', 'max:255'],
            'complemento'           => ['required', 'string', 'max:255'],
            'cep'                   => ['required', 'string', 'max:255'],
            'cidade'                => ['required', 'string', 'max:255'],
            'estado'                => ['required', 'string', 'max:255'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        if($data['identificacao'] == "Síndico"){

            if(count($_FILES) > 0){
                $tipo = $_FILES["ataEleicao"]['type'];
                $extensao = pathinfo($_FILES['ataEleicao']['name'], PATHINFO_EXTENSION);

                if($tipo == "application/pdf"){

                    $upload_dir = 'upload/ata/';
                        $temporario = $_FILES['ataEleicao']['tmp_name'];
                        $novo_nome = time() . "-" . $_FILES['ataEleicao']['name'];

                        move_uploaded_file($temporario, $upload_dir.$novo_nome);
                            
                        return User::create([
                            'nome'                  => $data['nome'],
                            'tipo_de_usuario'       => $data['identificacao'],
                            'condominio'            => $data['condominio'],
                            'quantidade_unidades'   => $data['qtdUnidades'],
                            'mandato_inicio'        => $data['mandatoInicio'],
                            'mandato_fim'           => $data['mandatoFim'],
                            'ata_eleicao'           => $novo_nome,
                            'genero'                => $data['identificacaoGenero'],
                            'telefone'              => $data['telefone'],
                            'endereco'              => $data['endereco'],
                            'numero'                => $data['numero'],
                            'bairro'                => $data['bairro'],
                            'complemento'           => $data['complemento'],
                            'cep'                   => $data['cep'],
                            'cidade'                => $data['cidade'],
                            'estado'                => $data['estado'],
                            'email'                 => $data['email'],
                            'password'              => Hash::make($data['password']),
                        ]);
                    
                } else {
                    //
                }
            }
        }

        if($request->identificacao == "Fornecedor"){
            return User::create([
                'nome'                  => $data['nome'],
                'tipo_de_usuario'       => $data['identificacao'],
                'condominio'            => "",
                'quantidade_unidades'   => 0,
                'mandato_inicio'        => "",
                'mandato_fim'           => "",
                'ata_eleicao'           => "",
                'genero'                => $data['identificacaoGenero'],
                'telefone'              => $data['telefone'],
                'endereco'              => $data['endereco'],
                'numero'                => $data['numero'],
                'bairro'                => $data['bairro'],
                'complemento'           => $data['complemento'],
                'cep'                   => $data['cep'],
                'cidade'                => $data['cidade'],
                'estado'                => $data['estado'],
                'email'                 => $data['email'],
                'password'              => Hash::make($data['password']),
            ]);
        }
        
    }
}
