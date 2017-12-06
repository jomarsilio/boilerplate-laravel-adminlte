<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Routing\Router;
use Illuminate\Routing\Route;
use App\Models\Permission;
use App\Models\Role;

class PermissionCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create permissions on the database based on the routes file';

    /**
     * The router instance.
     *
     * @var \Illuminate\Routing\Router
     */
    protected $router;
    
    /**
     * An array of all the registered routes.
     *
     * @var \Illuminate\Routing\RouteCollection
     */
    protected $routes;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Router $router)
    {
        parent::__construct();

        $this->router = $router;
        $this->routes = $router->getRoutes();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (count($this->routes) == 0) {
            return $this->error("Your application doesn't have any routes.");
        }

        $this->savePermissions($this->getRoutes());

        $this->info('Routes saved in the database.');
    }

    /**
     * Compile the routes into a displayable format.
     *
     * @return array
     */
    protected function getRoutes()
    {
        $routes = collect($this->routes)->map(function ($route) {
            return $this->getRouteInformation($route);
        })->all();

        return array_filter($routes);
    }

    /**
     * Get the route information for a given route.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return array
     */
    protected function getRouteInformation(Route $route)
    {
        return $this->filterRoute([
             'name'       => $route->getName(),
             'middleware' => $this->getMiddleware($route),
        ]);
    }

    /**
     * Get before filters.
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

    /**
     * Filter the route by middleware.
     *
     * @param  array  $route
     * @return array|null
     */
    protected function filterRoute(array $route)
    {
        if (!Str::contains($route['middleware'], 'route-permission')) {
            return;
        }

        return $route;
    }

    /**
     * Save permissions on database.
     */
    protected function savePermissions(array $routes)
    {
        // Restaga o papel do administrador.
        $admin = Role::where('name', 'admin')->first();

        // Desativa todas as permissões.
        $this->disablePermissions();

        foreach ($routes as $route) {
            // Resgata os valores da permissão.
            $permission = Permission::where('name', $route['name'])->first();

            // A permissão não existe na base de dados?
            if (!$permission) {
                $permission = new Permission();
            }

            // Seta os valores da permissão.
            $permission->name =  $route['name'];
            $permission->display_name =  trans('route.'.$route['name']);
            $permission->active =  true;

            $permission->save();

            // Associa a permissão ao administrador.
            $admin->savePermissions($permission);
        }
    }

    /**
     * Disable saved permissions.
     */
    protected function disablePermissions()
    {
        Permission::where('active', true)->update(['active' => false]);
    }
}
