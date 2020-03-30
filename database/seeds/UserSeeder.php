<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\user::create([
            'name' => 'admin',
            'email'=>'admin@mail.com',
            'email_verified_at' => now(),
            'password'=>Hash::make('123456'),
            'remember_token' => Str::random(10),
        ]);
    }
}
