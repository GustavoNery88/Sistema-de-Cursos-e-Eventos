<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios.cadastrar');
    }

    public function store(Request $request)
    {
        // Checa se o email já existe
        if (Usuario::where('email', $request->email)->exists()) {
            return redirect()->route('usuarios.index')->with('error', 'E-mail já em uso!');
        }

        // Verifica se a senha é nula ou tem menos de 8 caracteres
        if ($request->password == null || strlen($request->password) < 8) {
            
            return redirect()->route('usuarios.index')>with('error', 'Senha deve ter no mínimo 8 caracteres!');
        }

        // Cria o usuário
        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function login()
    {
        return view('usuarios.login');
    }

    public function autenticar(Request $request)
    {
        try {
            $autenticacao = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

            if ($autenticacao) {
                // Autenticação bem-sucedida
                return redirect()->route('home')->with('success', 'Login realizado com sucesso!');
            } else {
                // Credenciais inválidas
                return redirect()->route('login')->with('error', 'Credenciais inválidas!');
            }
        } catch (Exception $e) {
            // Usuário não encontrado
            return redirect()->route('login')->with('error', 'Credenciais inválidas!');
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout realizado com sucesso!');
    }
}
