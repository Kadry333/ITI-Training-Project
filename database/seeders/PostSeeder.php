<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Assuming you have users in your database
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) { // Create 5 posts per user
                Post::create([
                    'title' => $faker->sentence,
                    'created_by' => $faker->name, // Generate a random name
                    'created_at' => $faker->dateTime, // Generate a random date
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}