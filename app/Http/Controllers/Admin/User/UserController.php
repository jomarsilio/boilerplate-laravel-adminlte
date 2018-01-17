<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\UserRequest as Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use \DB;

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
        $users = User::with('roles')
            ->orderBy('name')
            ->paginate(config('constant.pagination.perPage'));

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
        DB::transaction(function () use ($request) {
            // Resgata os valores do formulário.
            $userRequest = $request->input('user');
            $roleId = $request->input('role_id');

            // Trata o status do usuário.
            $userRequest['active'] = empty($userRequest['active']) ? false : true;
            $userRequest['password'] = Hash::make($userRequest['password']);

            // Grava o usuário.
            $user = User::create($userRequest);

            // Atribui o papel.
            $user->attachRole($roleId);
        });

        // Retorna a mensagem e sucesso.
        return redirect()
            ->route('admin.user.index')
            ->with('success', trans('user.response.success.create'));
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
        DB::transaction(function () use ($request, $user) {
            // Resgata os valores do formulário.
            $userRequest = $request->input('user');
            $roleId = $request->input('role_id');
            
            // Trata os valores a serem alterados.
            $userRequest['active'] = empty($userRequest['active']) ? false : true;
            $userRequest['password'] = empty($userRequest['password']) ? $user->password : Hash::make($userRequest['password']);
            $userRequest['username'] = $user->username;
            
            // Grava o usuário e atribui o papel.
            $user->update($userRequest);
            $user->roles()->sync($roleId);
        });

        // Retorna a mensagem e sucesso.
        return redirect()
            ->route('admin.user.index')
            ->with('success', trans('user.response.success.update'));
    }
}
