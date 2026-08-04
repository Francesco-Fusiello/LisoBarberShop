<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'app:create-admin-user';

    protected $description = 'Crea un nuovo amministratore';

    public function handle()
    {
        $name = $this->ask('Nome amministratore');

        $email = $this->ask('Email amministratore');

        $password = $this->secret('Password amministratore');

        if (User::where('email', $email)->exists()) {
            $this->error('Esiste già un utente con questa email.');
            return Command::FAILURE;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('Amministratore creato correttamente!');

        return Command::SUCCESS;
    }
}