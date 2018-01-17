<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Entrust;

class RoutePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Resgata o nome da rota atual.
        $routeName = Route::currentRouteName();

        // É usuário sem autenticação ou sem permissão de acesso para a rota atual?
        if (auth()->guest() || !auth()->user()->can($routeName)) {
            abort(403, 'Unauthorized action');
        }

        return $next($request);
    }
}
