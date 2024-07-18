<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RendiAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:rendi-admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that allow you to make someone Admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Rendendo utente ' . $this->argument('email') . ' admin');
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();
        if($user == null) {
            $this->error('Utente ' . $email . ' non trovato');
            return;
        } else {
            if($user->admin){
                $this->info('Utente indicato già admin');
            } else {
                $user->update([
                    'admin' => true,
                    'reviewer' => true
                ]);
                $this->info('Utente ' . $email . ' reso admin');
            }
        }
    }
}