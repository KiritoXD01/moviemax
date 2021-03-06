<?php

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'email' => 'test@moviemax.com',
            'user_type' => App\Enums\UserType::ADMIN
        ]);

        factory(App\Models\User::class, 5)->create([
            'user_type' => App\Enums\UserType::USER
        ]);
    }
}
