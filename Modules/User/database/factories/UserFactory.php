<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Modules\User\Enum\RoleEnum;
use Modules\User\Models\User;
use Modules\User\Models\UserEntry;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = User::class;
    protected static ?string $password;

    public function configure(): Factory|\Database\Factories\UserFactory
    {
        return $this->afterCreating(function (User $user) {
            UserEntry::factory()->state([
                'user_id' => $user->id,
            ])->create();
            $user->assignRole(RoleEnum::Normal);
        });
    }

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'password' => static::$password ??= Hash::make('password'),
        ];
    }
}

