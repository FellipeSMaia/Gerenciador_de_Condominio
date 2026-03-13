<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;


class UserController extends Controller
{
    public function index(): Response
    {
        $users = User::orderBy('id')->paginate(10);

        return Inertia::render('Users/UserIndex', [
            'users' => $users
        ]);
    }

    public function show(User $user): Response
    {
        return Inertia::render('Users/UserShow', [
            'user' => $user
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Users/UserCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ],
        [   
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome não pode exceder 255 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string' => 'O campo e-mail deve ser uma string.',
            'email.lowercase' => 'O campo e-mail deve estar em letras minúsculas.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O campo e-mail não pode exceder 255 caracteres.',
            'email.unique' => 'O e-mail já está em uso.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.max' => 'O campo senha não pode exceder 255 caracteres.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'password.password' => 'A senha deve atender aos requisitos de segurança padrão.',
        ]
      );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return Redirect::route('users.show', ['user' => $user->id])->with('success', 'Usuário criado com sucesso!');

    }

    public function edit(User $user): Response
    {
        return Inertia::render('Users/UserEdit', [
            'user' => $user
        ]);
    }
    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email, {$user->id}",
        ],
        [   
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome não pode exceder 255 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string' => 'O campo e-mail deve ser uma string.',
            'email.lowercase' => 'O campo e-mail deve estar em letras minúsculas.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O campo e-mail não pode exceder 255 caracteres.',
            'email.unique' => 'O e-mail já está em uso por outro usuário.',
        ]
      );

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return Redirect::route('users.show', ['user' => $user->id])->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }

}
