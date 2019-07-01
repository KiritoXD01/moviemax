<?php

use Illuminate\Database\Seeder;

class UserSeederForTesting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'user_type' => App\Enums\UserType::USER
        ]);
    }
}
