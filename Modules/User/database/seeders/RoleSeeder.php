<?php

namespace Modules\User\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\User\Enum\RoleEnum;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = RoleEnum::values();
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
