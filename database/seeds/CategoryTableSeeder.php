<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category'=>'Education',
            'description'=>'Education makes man civilized',
            'created_at'=>\Carbon\Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'category'=>'World',
            'description'=>'This world is very chromatic',
            'created_at'=>\Carbon\Carbon::now(),
        ]);
    }
}
