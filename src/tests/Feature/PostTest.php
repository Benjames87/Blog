<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;;

class PostTest extends TestCase
{
    /** @test */
    public function a_post_can_be_created()
    {
        $postCount = Post::all()->count();
        $post = Post::factory()->create();

        $this->assertCount(($postCount+1), Post::all()->count());
    }

    /** @test */
    public function a_post_has_a_title()
    {
        $post = Post::factory()->create(['title' => 'My First Post']);

        $this->assertEquals('My First Post', $post->title);
    }

}
