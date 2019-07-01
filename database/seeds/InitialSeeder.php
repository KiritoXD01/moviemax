<?php

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
            'email' => 'manuelmercedez10@gmail.com',
            'user_type' => App\Enums\UserType::ADMIN
        ]);

        factory(App\Models\User::class, 5)->create([
            'user_type' => App\Enums\UserType::USER
        ]);
    }
}
