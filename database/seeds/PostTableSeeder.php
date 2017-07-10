<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Post one',
            'body' => 'This is the demo content one',
            'category_id' => 1,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
