<?php

use Illuminate\Database\Seeder;

class DatabaseProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
                'name' => 'wahyu dhira ashandy',
                'gender' => 'male',
                'address' => 'Surakarta',
                'phone' => '085728888888',
                'roles' => 'admin',
                'images_profile' => 'user2-160x160.jpg'
                ]);
    }
}
