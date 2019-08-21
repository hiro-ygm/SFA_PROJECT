<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
            'name' => '高橋　一郎',
            'email' => 'takahashiichiro@zmail.com',
            'password' => 11111111,
            'customer_id' => 1,
            'image' => 'youngman_32.png',
            'department' => '開発',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('users')->insert([
            'name' => '山本　市子',
            'email' => 'yamamotoichiko@zmail.com',
            'password' => 11111111,
            'customer_id' => 2,
            'image' => 'youngwoman_48.png',
            'department' => '総務部',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
