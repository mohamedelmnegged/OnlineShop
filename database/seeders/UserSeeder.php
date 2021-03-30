<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'mohamed',
            'email' => 'mohamed@example.com',
            'phone' => '1234567891',
            'password' => bcrypt('123456'),
            'address' => '12 elnaser Street',
            'status' => 1
        ]);
        User::create([
            'name' => 'ahmed',
            'email' => 'ahmed@example.com',
            'phone' => '1234567892',
            'password' => bcrypt('123456'),
            'address' => '12 elnaser Street',
            'status' => 0
        ]);
        User::create([
            'name' => 'omar',
            'email' => 'omar@example.com',
            'phone' => '1234567893',
            'password' => bcrypt('123456'),
            'address' => '25 eltahrerir Street',
            'status' => 1
        ]);

        User::create([
            'name' => 'mostafa',
            'email' => 'mostafa@example.com',
            'phone' => '1234567894',
            'password' => bcrypt('123456'),
            'address' => '25 eltahrerir Street',
            'status' => 1
        ]);

    }
}
