<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Azka Lufthansa',
            'username' => 'azkalufthansa',
            'email' => 'azkalufthansa@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '082120205224',
            'birthday' => '2005-06-28',
            'role' => 'admin',
            'image' => 'user_image/default_profile.png'
        ]);
        User::create([
            'name' => 'Salfa Juliansyah',
            'username' => 'salfajuliansyah',
            'email' => 'salfajuliansyah@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '082120205224',
            'birthday' => '2022-11-15',
            'role' => 'admin',
            'image' => 'user_image/default_profile.png'
        ]);
        User::create([
            'name' => 'Muhammad Hizba Haekal',
            'username' => 'hizbahaekal',
            'email' => 'hizbahaekal@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '082120205224',
            'birthday' => '2022-11-15',
            'role' => 'admin',
            'image' => 'user_image/default_profile.png'
        ]);
        User::create([
            'name' => 'Nazwa Wahdatul Aisya',
            'username' => 'nazwawahdatul',
            'email' => 'nazwawahdatul@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '082120205224',
            'birthday' => '2022-11-15',
            'role' => 'admin',
            'image' => 'user_image/default_profile.png'
        ]);
        User::create([
            'name' => 'Puti Putriani',
            'username' => 'putiputriani',
            'email' => 'putiputriani@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '082120205224',
            'birthday' => '2022-11-15',
            'role' => 'admin',
            'image' => 'user_image/default_profile.png'
        ]);
        User::create([
            'name' => 'Tiya Tresnawati',
            'username' => 'tiyatresnawati',
            'email' => 'tiyatresnawati@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '082120205224',
            'birthday' => '2022-11-15',
            'role' => 'admin',
            'image' => 'user_image/default_profile.png'
        ]);
    }
}
