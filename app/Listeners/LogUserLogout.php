<?php

namespace App\Listeners;

use App\Models\Audit;
use Illuminate\Auth\Events\Logout;

class LogUserLogout
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
    public function handle(Logout $event): void
    {
        Audit::create([
            'user_id' => $event->user?->getAuthIdentifier(),
            'accion' => 'Cerró sesión',
            'tabla' => 'users',
            'datoAfectado' => 'Sesión',
            'ip_address' => request()->ip(),
        ]);
    }
}
