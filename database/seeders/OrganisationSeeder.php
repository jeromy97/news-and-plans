<?php

namespace Database\Seeders;

use App\Models\Organisation;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organisation::factory(1)
            ->has(
                User::factory(1)
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
