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
                       
        $category_names = ['Mobile', 'Tablet', 'Laptop and Computer', 'Accesories'];
        array_map(function ($category_name){
            $now = date('Y-m-d H:i:s', strtotime('now'));
            DB::table('categories')->insert([
                'created_at'=>$now,
                'updated_at'=>$now,
                'category_name' => $category_name
            ]);
        }, $category_names);
    }
    
}
