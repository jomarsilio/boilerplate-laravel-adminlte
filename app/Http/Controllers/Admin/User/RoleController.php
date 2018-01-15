<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\RoleRequest as Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Exibe os papéis cadastrados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Resgata os papéis cadastrados.
        $roles = Role::withCount('users')->orderBy('name')->get();

        return view('admin.user.role.index', compact('roles'));
    }

    /**
     * Exibe o formulário de cadastro de novos papéis.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.role.create');
    }

    /**
     * Grava os dados de um novo papel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Resgata os valores do formulário.
        $roleRequest = $request->input('role');

        // Grava o usuário e atribui o papel.
        Role::create($roleRequest);

        // Retorna a mensagem e sucesso.
        return redirect()
            ->route('admin.user.role.index')
            ->with('success', trans('role.response.success.create'));
    }

    /**
     * Exibe o formulário de edição de papéis.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.user.role.edit', compact('role'));
    }

    /**
     * Altera os dados de um papel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // Resgata os valores do formulário.
        $roleRequest = $request->input('role');

        // Trata os valores a serem alterados.
        $roleRequest['name'] = $role->name;
        
        // Altera os dados do papel.
        $role->update($roleRequest);

        // Retorna a mensagem e sucesso.
        return redirect()
            ->route('admin.user.role.index')
            ->with('success', trans('role.response.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // O papel possui usuários relacionados?
        if ($role->users()->count()) {
            // Retorna a mensagem de erro.
            return redirect()
                ->route('admin.user.role.index')
                ->with('error', trans('role.response.error.destroy', ['name' => $role->display_name]));
        }

        // Remove o papel e seus relacionamentos.
        $role->delete();

        // Retorna a mensagem de sucesso.
        return redirect()
            ->route('admin.user.role.index')
            ->with('success', trans('role.response.success.destroy'));
    }
}
