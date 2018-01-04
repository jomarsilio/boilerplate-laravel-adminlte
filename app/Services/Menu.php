<?php

namespace App\Services;

use App\Services\Service;
use Illuminate\Support\Str;

class Menu extends Service
{
    /**
     * Rotas sem filtro de permissão.
     */
    private $freeRoutes;

    public function __construct()
    {
        $this->freeRoutes = $this->getFreeRoutes();
    }

    /**
     * Retorna o menu do usuário autenticado.
     *
     * @return Array
     */
    public function filter()
    {
        // Resgata os menus.
        $groups = config('menu.aside');

        foreach ($groups as $key => &$group) {
            // Verifica a permissão e acesso aos menus.
            $group = $this->checkPermission($group);

            // O grupo não possui menus?
            if (empty($group)) {
                
                // Remove o grupo.
                unset($groups[$key]);
            }
        }

        return $groups;
    }

    /**
     * Filtra os menus verificando a permissão de acesso.
     *
     * @param array $menus
     * @return Array
     */
    private function checkPermission($menus)
    {
        foreach ($menus as $key => &$menu) {

            // Tem submenu?
            if (!empty($menu['children'])) {
                $menu['children'] = $this->checkPermission($menu['children']);
            }

            // Não tem rota definida?.
            if (empty($menu['route'])) {
                
                // Submenu não existe?
                if (!isset($menu['children'])) {
                    continue;
                }

                // Tem submenus?
                if (!empty($menu['children'])) {
                    continue;
                }

                // Remove o menu.
                unset($menus[$key]);
                continue;
            }

            // Rotas sem validação de permissão?
            if ($this->freeRoutes->contains($menu['route'])) {
                continue;
            }

            // Tem permissão para acessar a rota?
            if (auth()->user()->can($menu['route'])) {
                continue;
            }

            // Remove o menu.
            unset($menus[$key]);
        }

        return $menus;
    }


    /**
     * Filtra as rotas que não necessitam de permissão de acesso.
     *
     * @return Collection
     */
    private function getFreeRoutes()
    {
        // Resgata as rotas da aplicação.
        $routes = app()->routes->getRoutes();

        $routes = collect($routes)->map(function ($route) {
            $middleware = $this->getMiddleware($route);

            // A rota não utiliza o middleware de permissão de rota?
            if (!Str::contains($middleware, 'route-permission')) {
                return $route->getName();
            }
        })->all();

        // Remove os itens vazios.
        $routes = array_filter($routes);

        return collect($routes);
    }

    /**
     * Retorna os middleware da rota.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return string
     */
    protected function getMiddleware($route)
    {
        return collect($route->gatherMiddleware())->map(function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        })->implode(',');
    }
}
