<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Log\LogAuth;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Seta e grava a data do último acesso.
        $event->user->accessed_at = now();
        $event->user->save();

        // Resgata os dados da requisição.
        $request = request();

        // Grava o log.
        LogAuth::create([
            'user_id' => $event->user->id,
            'username' => $request->input('username') ?: auth()->user()->username,
            'method' => $request->method(),
            'url' => $request->url(),
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'success' => true
        ]);
    }
}
