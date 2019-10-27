<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_admin_user_can_access_the_admin_page()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function non_admin_users_cannon_access_the_admin_page()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([
            'role' => 'member'
        ]);

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function non_authenticated_users_cannot_reach_the_admin_page()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/admin');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
