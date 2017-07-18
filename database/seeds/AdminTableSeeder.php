<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     * seed Admin
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mukesh',
            'email' => 'william.mukesh@ithands.biz',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);

       factory(App\User::class, 10)->create();

    }
}
