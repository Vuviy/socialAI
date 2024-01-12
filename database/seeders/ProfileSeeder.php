<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $users = User::query()->where('id', '>', 2)->get();

         foreach ($users as $user)
         {
             Profile::create([
                 'first_name' => fake()->firstName(),
                 'user_id' => $user->id,
                 'last_name' => fake()->lastName(),
                 'additional_name' => fake()->lastName(),
                 'birthday' => fake()->time('Y-m-d'),
                 'phone_number' => random_int(100000, 999999),
                 'overview' => fake()->realText(),
             ]);
         }
    }
}
