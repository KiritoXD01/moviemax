<?php

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
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

        factory(App\Models\Movie::class)->create([
            'title' => 'Avengers Endgame'
        ]);
    }
}
