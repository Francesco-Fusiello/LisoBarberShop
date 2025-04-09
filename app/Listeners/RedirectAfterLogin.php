<?php

namespace App\Listeners;

use IlluminateAuthEventsLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Queue\ShouldQueue;

class RedirectAfterLogin
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
        $user = $event->user;

        // Se l'utente è un amministratore, reindirizza alla pagina di gestione dei prodotti
        if ($user->is_admin) {
            return Redirect::route('product-crud'); // Route di amministrazione
        }

        // Altrimenti, reindirizza alla lista dei prodotti per gli utenti normali
        return Redirect::route('products');
    }
}
