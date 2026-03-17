<?php

namespace App\Listeners;

use App\Models\Audit;
use Illuminate\Auth\Events\Login;

class LogUserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        Audit::create([
            'user_id' => $event->user->getAuthIdentifier(),
            'accion' => 'login',
            'tabla' => 'users',
            'datoAfectado' => 'Inicio Sesión',
            'ip_address' => request()->ip(),
        ]);

    }
}
