<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password} {setting_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Validate argumens, i don't know how to do this with Laravel's validate() method.
        if (strlen($this->argument('name')) > 255){
            $this->error('Name length is too long');
            return 0;
        }
        if (strlen($this->argument('email')) > 255) {
            $this->error('Mail address length is too long');
            return 0;
        }
        if (!str_contains($this->argument('email'), '@')) {
            $this->error('Mail address is not valid');
            return 0;
        }

        // Create user
        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => Hash::make($this->argument('password')),
            'setting_id' => $this->argument('setting_id')
        ]);

        $this->info("User $user->name was succesfully created");
        $this->info('You can now login on ' . url('login'));
    }
}
