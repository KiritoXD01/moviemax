<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PassportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'name' => 'MovieMax',
            'secret' => 'VONOZnlURyWMmLv5wCtqMGCsZFIpRbKMspcy6bG3',
            'redirect' => 'http://moviemaxt.test',
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $client = DB::table('oauth_clients')->first();

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => $client->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        factory('App\Models\User')->create([
            'email' => 'testing@admin.com',
            'user_type' => App\Enums\UserType::USER
        ]);
    }
}
