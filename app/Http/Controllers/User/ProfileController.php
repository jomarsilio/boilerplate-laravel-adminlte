<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as Guard;
use App\Http\Requests\User\ProfileRequest as Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retorna os formulário de edição dos dados pessoais do usuário
     *
     * @return \View
     */
    public function edit()
    {
        // Resgata os dados do usuário autenticado.
        $user = auth()->user();
        
        return view('user.profile.edit', compact('user'));
    }

    /**
     * Atualiza os dados pessoais do usuário
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        // Resgata os valores do formulário.
        $password = $request->input('password');
        $newPassword = $request->input('new_password');
        $userValues = $request->input('user');

        // Resgata os dados do usuário autenticado.
        $user = auth()->user();

        // A senha informada confere com a salva na base de dados?
        if (!password_verify($password, $user->getAuthPassword())) {
            // Retorna o erro.
            return back()->with('error', trans('user.response.error.incorrect_password'));
        }

        if (!empty($newPassword)) {
            // Seta a nova senha de acesso.
            $user->password = Hash::make($newPassword);
        }

        // Percorre os valores a serem atualizados.
        foreach ($userValues as $key => $value) {
            $user->$key = $value;
        }
        
        $user->save();

        // Atualiza os dados da sessão.
        Guard::guard()->login($user);

        // Retorna a mensagem e sucesso.
        return redirect('home')->with('success', trans('user.response.success.profile_changed'));
    }
}
