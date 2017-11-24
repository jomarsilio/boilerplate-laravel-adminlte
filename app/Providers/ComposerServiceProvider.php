<?php

namespace App\Providers;

use Request;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Define o layout com base na requisição.
        view()->composer('*', function ($view) {
            // Layout default para requisições ajax.
            $layoutAjax = 'layouts.ajax';

            // Define o layout a ser carregado.
            $layout = Request::ajax() ? $layoutAjax : 'layouts.app';

            // Compartilha variáveis com a view.
            $view->with(compact('layout'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
