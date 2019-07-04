<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations, DatabaseMigrations;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('UserSeeder');
        $this->user = User::where('id', 2)->first();
    }

    /**
     * @test
     * test to verify if can create user
     */
    public function canCreateUser()
    {
        $data = [
            'firstname' => 'Luis',
            'lastname' => 'Perez',
            'email' => 'luisperez@hotmail.com',
            'password' => 'Password01@',
            'password_confirmation' => 'Password01@',
            'birthdate' => '10-09-1998',
            'user_type' => 1
        ];

        $this->post(route('user.store'), $data)
            ->assertStatus(201)
            ->assertJsonStructure([
                'firstname',
                'lastname',
                'email'
            ]);
    }

    /**
     * @test
     * test to verify if user can update the information
     */
    public function userCanUpdateInfo()
    {
        $data = [
            'firstname' => 'Javier',
            'lastname' => 'Mercedes',
        ];

        $this->actingAs($this->user, 'api')
            ->patch(route('user.update', 2), $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                'firstname',
                'lastname',
                'email'
            ]);

        $this->assertEquals($data['firstname'], User::where('id', 2)->first()->firstname);
    }
}
