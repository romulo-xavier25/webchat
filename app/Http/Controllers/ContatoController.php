<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailOuvidoria;
use App\Models\Contato;

class ContatoController extends Controller
{

    public function index()
    {
        return view('paginas.contato');
    }

    protected function create(Request $request)
    {
        //dd($request->all());
        $contato = new Contato();
        $contato->cadastrarFormularioContato($request);
        Mail::to('romulo@lasswelldigital.com.br')->send(new SendMailOuvidoria($request));

        return redirect()
                    ->route('contato')
                    ->with('success', 'Mensagem de contato enviada com sucesso!');
        
    }

}
