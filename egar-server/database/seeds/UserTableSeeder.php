<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'admin',
            'fullname' => 'Doan Huu Le Huan',
            'email' => 'doanhuu.lehuan@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => rand(1000000, 9999999),
            'avatar' => '',
            'role' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'status' => 1,
        ]);
        DB::table('users')->insert([
            'username' => 'user1',
            'fullname' => 'Nguoi dung 1',
            'email' => 'user1@mail.com',
            'password' => bcrypt('123456'),
            'phone' => rand(1000000, 9999999),
            'avatar' => '',
            'role' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'status' => 1,
        ]);
        DB::table('users')->insert([
            'username' => 'store_owner1',
            'fullname' => 'Cua hang 1',
            'email' => 'store1@mail.com',
            'password' => bcrypt('123456'),
            'phone' => rand(1000000, 9999999),
            'avatar' => '',
            'role' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'status' => 1,
        ]);
    }
}
