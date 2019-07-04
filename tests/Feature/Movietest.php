<?php

namespace Tests\Feature;

use http\Client\Curl\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class Movietest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('MovieSeeder');
        $this->user = User::first();
    }

    /**
     * @test
     * test to get movies based by title
     */
    public function userSearchMoviesByTitle()
    {
        $data = [
            'title' => 'Ave' //search for avengers endgame
        ];

        $this->actingAs($this->user, 'api')
            ->get(route('movie.search'), $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                'title'
            ]);
    }
}