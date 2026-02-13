<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Redirect;

class RedirectAfterLogin
{
    public function __construct()
    {
        //
    }

    public function handle(Login $event)
    {
        $user = $event->user;

        if ($user->is_admin) {
            return Redirect::route('product-crud');
        }

        return Redirect::route('products');
    }
}
