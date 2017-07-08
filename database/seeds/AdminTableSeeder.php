<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seed Admin

        DB::table('users')->insert([
            'name' => 'mukesh',
            'email' => 'william.mukesh@ithands.biz',
            'password' => bcrypt('password'),
            'role'=>1,

        ]);
    }
}
