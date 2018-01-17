<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Tentativas de autenticação.
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\Auth\LogSuccessfulLogin',
        ],
        'Illuminate\Auth\Events\Failed' => [
            'App\Listeners\Auth\LogFailedLogin',
        ],
        // Logout manual na aplicação.
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\Auth\LogSuccessfulLogout',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
