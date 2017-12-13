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
        $roles = Role::orderBy('name')->get();

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
        Role::create([
            'name' => $roleRequest['name'],
            'display_name' => $roleRequest['displayName'],
            'description' => $roleRequest['description'],
        ]);

        // Retorna a mensagem e sucesso.
        return redirect()->route('admin.user.role.index')->with('success', trans('role.response.success.create_role_user'));
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
        
        // Grava o usuário e atribui o papel.
        $role->display_name = $roleRequest['displayName'];
        $role->description = $roleRequest['description'];
        $role->save();

        // Retorna a mensagem e sucesso.
        return redirect()->route('admin.user.role.index')->with('success', trans('role.response.success.update_role_user'));
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
            return redirect()->route('admin.user.role.index')->with('error', trans('role.response.error.destroy_role_user', ['name' => $role->displayName]));
        }

        // Remove o papel e seus relacionamentos.
        $role->delete();

        // Retorna a mensagem de sucesso.
        return redirect()->route('admin.user.role.index')->with('success', trans('role.response.success.destroy_role_user'));
    }
}
