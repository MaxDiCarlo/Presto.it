<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RendiViewer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:rendi-reviewer {email}'; 

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Rendendo utente ' . $this->argument('email') . ' reviewer');
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();
        if($user == null) {
            $this->error('Utente ' . $email . ' non trovato');
            return;
        } else {
            if($user->reviewer){
                $this->info('Utente indicato già reviewer');
            } else {
                $user->update([
                    'reviewer' => true
                ]);
                $this->info('Utente ' . $email . ' reso reviewer');
            }
        }
    }
}
