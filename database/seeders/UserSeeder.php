<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrative user account
        User::create([
            'role_id'           => 1,
            'email'             => 'admin@admin.com',
            'password'          => bcrypt('password123'),
            'email_verified_at' => now(),
            'username'          => 'Administrator',
            'first_name'        => 'Blaze',
            'last_name'         => 'Yusuf',
            'phone_number'      => '08156262505',
            'image'             => URL::to('/') . ':' . env('APP_PORT') . '/assets/media/avatars/blank.png',
        ]);

        // Create global user for easy test
        User::create([
            'role_id'           => 2,
            'email'             => 'demo@gmail.com',
            'password'          => bcrypt('password123'),
            'email_verified_at' => now(),
            'username'          => 'Maruf',
            'first_name'        => 'Olaolu',
            'last_name'         => 'Yesufu',
            'phone_number'      => '2348156262505',
            'image'             => URL::to('/') . ':' . env('APP_PORT') . '/assets/media/avatars/blank.png',
        ]);

        // Generate 18 other client users
        User::factory(18)->create();
    }
}
