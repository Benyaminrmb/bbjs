<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Enum\UserEntryTypeEnum;

class UserEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\User\Models\UserEntry::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $types=collect(UserEntryTypeEnum::values());
        $type= $types->random();
        $entry = $type === UserEntryTypeEnum::phone_number->value ? $this->faker->regexify('/^(0910|0911|0912|0933|0935)\d{7}$/') : $this->faker->safeEmail();

        return [
            'type' => $type,
            'entry' => $entry,
            'verified_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}

