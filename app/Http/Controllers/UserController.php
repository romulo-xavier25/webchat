<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function cadastrarSindico(Request $request)
    {
        $user = new User();
        $user->cadastrarSindico($request);

        return redirect()
                        ->route('register');

    }

    public function listarTodosUsuarios()
    {
        //
    }

    public function listarUsuarioId()
    {
        //
    }

    public function editarUsuario()
    {
        //
    }
}
