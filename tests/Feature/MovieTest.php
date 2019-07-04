<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Movie;

class Movietest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    protected $user;
    protected $movie;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('MovieSeeder');
        $this->user = User::first();
        $this->movie = Movie::first();
    }

    /**
     * @test
     * test to get movies based by title
     */
    public function userCanSearchMoviesByTitle()
    {
        $data = [
            'title' => 'Ave' //search for avengers endgame
        ];

        $this->actingAs($this->user, 'api')
            ->post(route('movie.search'), $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'title'
                ]
            ]);
    }

    /**
     * @test
     * test to add movie to favorite
     */
    public function userCanAddMovieToFavorites()
    {
        $data = [
            'user_id' => $this->user->id,
            'movie_id' => $this->movie->id
        ];

        $this->actingAs($this->user, 'api')
            ->post(route('movie.addFavorite'), $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'title'
                ]
            ]);
    }

    /**
     * @test
     * test to remove favorite movie
     */
    public function userCanRemoveMovieFromFavorites()
    {
        $data = [
            'user_id' => $this->user->id,
            'movie_id' => $this->movie->id
        ];

        $this->actingAs($this->user, 'api')
            ->post(route('movie.removeFavorite'), $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'title'
                ]
            ]);
    }
}