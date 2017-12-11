<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\Users\UserRequest as Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Exibe os usuários cadastrados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Resgata os usuários.
        $users = User::orderBy('name')->get();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Exibe o formulário de cadastro de novos usuários.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Resgata os papéis.
        $roles = Role::orderBy('name')->get();

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Grava os dados de um novo usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Resgata os valores do formulário.
        $userRequest = $request->input('user');
        $roleId = $request->input('roleId');

        // Criptografa a senha.
        $userRequest['password'] = Hash::make($userRequest['password']);

        // Caso o usuário não esteja ativo.
        if (empty($userRequest['active'])) {
            $userRequest['active'] = false;
        }

        // Grava o usuário e atribui o papel.
        $user = new User($userRequest);
        $user->save();
        $user->attachRole($roleId);

        // Retorna a mensagem e sucesso.
        return redirect()->route('admin.user.index')->with('success', trans('user.response.success.create_user_account'));
    }

    /**
     * Exibe o formulário de edição de usuários.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Resgata os papéis.
        $roles = Role::orderBy('name')->get();
        
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Altera os dados de um usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Resgata os valores do formulário.
        $userRequest = $request->input('user');
        $roleId = $request->input('roleId');

        // Trata os valores a serem alterados.
        $user->name = $userRequest['name'];
        $user->email = $userRequest['email'];
        $user->active = empty($userRequest['active']) ? false : true;
        $user->password = empty($userRequest['password']) ? $user->password : Hash::make($userRequest['password']);
        
        // Grava o usuário e atribui o papel.
        $user->save();
        $user->detachRoles();
        $user->attachRole($roleId);

        // Retorna a mensagem e sucesso.
        return redirect()->route('admin.user.index')->with('success', trans('user.response.success.update_user_account'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
