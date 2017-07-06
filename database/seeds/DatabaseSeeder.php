<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Call AdminTableSeeder to seed Admin
         $this->call(AdminTableSeeder::class);
         $this->call(PostTableSeeder::class);

    }
}
