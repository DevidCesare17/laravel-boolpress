<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $user = User::inRandomOrder()->first();

            $newPost = new Post;
            $newPost->user_id = $user->id;
            $newPost->title = $faker->sentence(6, true);
            $newPost->content = $faker->paragraph(6, true);
            $newPost->slug = Str::of($newPost->title)->slug('-');
            $newPost->save();
        }
    }
}
