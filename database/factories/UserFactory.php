<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $arr = ['a','b','e','t','q','z','i','o','d','l','x',];
        return [
            'name' => fake()->firstName(),
            'email' => $arr[random_int(0, 10)].'@'.$arr[random_int(0, 10)].'.'.$arr[random_int(0, 10)],
            'password' => '$2y$10$Ta2MBVfhH20K90RZ/vPM9.99xtg8ZL4I18ZLJa.S.PIlodEBBgbPG', // password
        ];
    }

}
