<?php

namespace App\Console\Commands;

use App\Models\Settings;
use Illuminate\Console\Command;

class SettingCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setting:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create setting';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Create setting
        $setting = Settings::create([
            'name' => $this->argument('name')
        ]);

        $this->info("Setting \"$setting->name\" ($setting->id) was successfully created");
    }
}
