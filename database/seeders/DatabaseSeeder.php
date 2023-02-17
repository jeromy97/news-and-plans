<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\News;
use App\Models\Organisation;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Organisation::factory(1)
            ->has(
                User::factory(1)
                    ->has(Plan::factory(100))
                    ->has(News::factory(100))
                    ->state(function () {
                        return [
                            'email' => 'jhettinga@fletcher.nl',
                            'password' => bcrypt('password')
                        ];
                    })
            )
            ->create();
    }
}
