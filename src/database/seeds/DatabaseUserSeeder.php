<?php

use Illuminate\Database\Seeder;

class DatabaseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'spider',
                'email' => 'spider@diaddemi.web.id',
                'password' => bcrypt('spider'),
                'profile_id' => '1'
                ]);
    }
}
