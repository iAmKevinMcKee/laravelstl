<?php

namespace Tests\Feature;

use App\User;
use App\Event;
use App\EventVote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventVotesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_user_can_vote_for_an_event()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $event = factory(Event::class)->create();

        $user->event_votes()->create([
            'event_id' => $event->id,
            'value' => 1
        ]);

        $this->assertCount(1, EventVote::all());
        $this->assertEquals(1, $event->event_votes->sum('value'));
    }

    /**
     * @test
     */
    public function the_event_score_is_the_sum_of_its_votes_values()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $event = factory(Event::class)->create();

        $user->event_votes()->create([
            'event_id' => $event->id,
            'value' => 1
        ]);

        $user2->event_votes()->create([
            'event_id' => $event->id,
            'value' => 1
        ]);

        $this->assertCount(2, EventVote::all());
        $this->assertEquals(2, $event->event_votes->sum('value'));
    }

    /**
     * @test
     */
    public function a_user_can_down_vote_an_event()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $event = factory(Event::class)->create();

        $user->event_votes()->create([
            'event_id' => $event->id,
            'value' => -1
        ]);

        $this->assertCount(1, EventVote::all());

        $this->assertEquals(-1, $event->event_votes->sum('value'));
    }
}
