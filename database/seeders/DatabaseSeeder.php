<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (UserType::all()->count() == 0) {
            UserType::create([
                'name' => 'Admin',
            ]);
            UserType::create([
                'name' => 'User',
            ]);

            //default users
            User::create([
                'name' => 'admin',
                'email' => 'admin@sample.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'user_type_id' => 1,
            ]);

            User::create([
                'name' => 'customer',
                'email' => 'customer@sample.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'user_type_id' => 2,
            ]);
        }

        \App\Models\User::factory(rand(5,10))->create();
        \App\Models\Catalog::factory(rand(3,10))->create();
        \App\Models\Product::factory(rand(10,30))->create();
    }
}
