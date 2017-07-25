<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * seed Category
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title'=>'Education',
            'description'=>'Education makes man civilized',
            'created_at'=>\Carbon\Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'title'=>'World',
            'description'=>'This world is very chromatic',
            'created_at'=>\Carbon\Carbon::now(),
        ]);


        factory(App\Category::class, 20)->create();


    }
}
