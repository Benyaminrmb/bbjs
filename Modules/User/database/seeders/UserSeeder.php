<?php

namespace Modules\User\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\User\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(rand(6, 10))->create();
    }
}
