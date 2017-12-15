<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Lista as permissões.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        // Resgata as permissões cadastradas.
        $permissions = Permission::where('active', true)->orderBy('name')->get();

        return view('admin.user.role.permission.index', compact('role', 'permissions'));
    }

    /**
     * Altera uma permissão para um papel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role, Permission $permission)
    {
        $active = $request->input('active');

        // A permissão não está liberada para este papel e a instrução é para liberar?
        if ($active && !$role->hasPermission($permission->name)) {
            // Libera a permissão.
            $role->attachPermission($permission);
        } elseif (!$active) {
            // Remove a liberação para a permissão.
            $role->detachPermission($permission);
        }

        // O retorno deve ser json?
        if ($request->wantsJson()) {
            // Código http da resposta.
            $httpResponse = false ? Response::HTTP_BAD_REQUEST : Response::HTTP_OK;
            
            // Retorno como json.
            return response()->json([
                'success' => trans('role.response.success.destroy_role_user')
            ], $httpResponse);
        }

        return redirect()
            ->route('admin.user.role.permission.index', $role)
            ->with('success', trans('role.response.success.destroy_role_user'));
    }
}
