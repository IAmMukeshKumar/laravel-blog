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
            'title'=>'Post one',
            'content'=>'This is the demo content one',
            'category_id'=>1,
            'status'=>1,
        ]);

        DB::table('posts')->insert([
            'title'=>'Post two',
            'content'=>'This is the demo content two',
            'category_id'=>2,
            'status'=>0,
        ]);
    }
}
