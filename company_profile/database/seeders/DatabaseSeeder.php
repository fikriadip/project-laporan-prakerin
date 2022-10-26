<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Primago',
            'email' => 'admin@primago.com',
            'photo' => 'avatar_default.png',
            'password' => Hash::make('admin123'),
            'created_at' => Carbon::now()
        ]);
    }
}
