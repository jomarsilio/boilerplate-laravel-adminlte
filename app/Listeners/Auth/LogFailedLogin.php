<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Failed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Log\LogAuth;

class LogFailedLogin
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
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        // Resgata os dados da requisição.
        $request = request();

        // Grava o log.
        LogAuth::create([
            'user_id' => !empty($event->user->id) ? $event->user->id : null,
            'username' => $request->input('username'),
            'method' => $request->method(),
            'url' => $request->url(),
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'success' => false
        ]);
    }
}
