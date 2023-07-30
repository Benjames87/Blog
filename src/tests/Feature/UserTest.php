<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function a_new_user_gets_user_role_after_registration()
    {
        // Given: a new user
        $user = User::factory()->create();

        // Then: the user should have the 'user' role
        $this->assertTrue($user->hasRole('user'));
    }
}
