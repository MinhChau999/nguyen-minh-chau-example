<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');

        for ($i = 1; $i <= 100; $i++) {
            $arr[] = [
                'name'     => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->email,
                'password' => $faker->password,
            ];
        }
        
        User::insert($arr);
    }
}
