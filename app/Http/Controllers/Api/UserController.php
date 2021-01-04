<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Auth;

class UserController extends Controller
{

    public function me()
    {
        $user_logado = Auth::user();
        
        return response()->json([
            'user' => $user_logado,
        ], Response::HTTP_OK);
    }

    public function index()
    {
        $user_logado = Auth::user();
        $users = User::where('id', '!=', $user_logado->id)->get();
        return response()->json([
            'users' => $users
        ], Response::HTTP_OK);
    }

    public function show(User $user)
    {
        return response()->json(['user' => $user], Response::HTTP_OK);
    }
}
