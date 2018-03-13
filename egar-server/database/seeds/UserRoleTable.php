<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_roles_vocabulary')->insert([
            'title' => 'administrator',
            'description' => 'Administrator permission',
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('user_roles_vocabulary')->insert([
            'title' => 'moderator',
            'description' => 'Moderator permission',
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('user_roles_vocabulary')->insert([
            'title' => 'store_owner',
            'description' => 'Store owner permission',
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('user_roles_vocabulary')->insert([
            'title' => 'user',
            'description' => 'User permission',
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('user_roles_vocabulary')->insert([
            'title' => 'banned',
            'description' => 'Banned users',
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
