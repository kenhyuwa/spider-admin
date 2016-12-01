<?php

use Illuminate\Database\Seeder;

class SpiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DatabaseProfileSeeder::class);
        $this->call(DatabaseUserSeeder::class);
    }
}
