<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() : void
    {
        Post::factory(10)->create();

        Post::factory()->create([
            'title' => 'Test Article',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet quam turpis.
            In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus.
            Suspendisse efficitur neque sed condimentum molestie. Donec dapibus laoreet pellentesque',
            'user_id' => 2,
        ]);
    }
}
