<?php

use Illuminate\Database\Seeder;

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
        DB::table('Users')->insert([
            'username' => '鈴木',
            'mail' => 'cloud130302@gmail.com',
            'password' => bcrypt('123456'),
        ]);

    }
}
