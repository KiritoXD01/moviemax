<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('PassportSeeder');
    }

    /**
     * @test
     * test to verify if user can login with the auth api
     */
    public function userCanLogin()
    {
        $data = [
            'email' => 'testing@admin.com',
            'password' => 'password'
        ];

        $this->post(route('auth.login'), $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type'
            ]);
    }
}
