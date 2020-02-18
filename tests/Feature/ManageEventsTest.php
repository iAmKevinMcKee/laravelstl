<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageEventsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_admin_user_can_access_the_manage_users_page()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->get('/admin/events');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function non_admin_users_cannon_access_the_manage_users_page()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([
            'role' => 'member'
        ]);

        $response = $this->actingAs($user)->get('/admin/events');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function non_authenticated_users_cannot_reach_the_manage_users_page()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/admin/events');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function the_manage_users_view_gets_a_list_of_users_to_manage()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->get('/admin/events');
        $response->assertStatus(200);

        $response->assertViewIs('admin.events.index');
    }
}
