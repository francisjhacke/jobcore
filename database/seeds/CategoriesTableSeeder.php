<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
          'category_name' => 'Outdoors'
        ]);

        DB::table('categories')->insert([
          'category_name' => 'Technology'
        ]);

        DB::table('categories')->insert([
          'category_name' => 'Transportation'
        ]);

        DB::table('categories')->insert([
          'category_name' => 'General Labour'
        ]);
        
        DB::table('categories')->insert([
          'category_name' => 'Other Service'
        ]);
    }
}
