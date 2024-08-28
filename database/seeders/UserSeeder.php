<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i < 2000; $i++) {
            User::insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->name),
            ]);
        }
        //elequent/elequont
        // insert into user

        // cara ke-1
        // user::create([
        //     'name' => 'Admin',
        //     'email' => 'makan@gmail.com',
        //     'password' => Hash::make('12345678'),
        // ]);

        // // cara ke-2
        // $user = new User();
        // $user->name = 'Admin';
        // $user->email = 'admin@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->save();
    }
}
