<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function login(Request $request) {
        $request->validate( [
            "email"=> "required|email",
            "password"=> "required"
        ], [
            "email"=> "O campo email é obrigatório!",
            "email.email"=> "O campo email deve ser um email válido!",
            "password"=> "O campo senha é obrigatório!"
        ]);

        $credentials = $request->only('email', 'password');
        $autenticated = Auth::attempt($credentials);

        if (!$autenticated) {
            return redirect()->route('login.index')->withErrors(['errors' => 'Email ou senha inválidos!']);
        }

        return redirect()->route('emprestimos.listar');
        
    }
}
