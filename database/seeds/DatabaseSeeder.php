<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Call seeder classes
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        //$this->call(CategoryTableSeeder::class);
        //$this->call(PostTableSeeder::class);


    }
}
