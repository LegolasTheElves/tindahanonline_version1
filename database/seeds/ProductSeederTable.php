<?php

use Illuminate\Database\Seeder;

class ProductSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $images = [ '/images/Galaxy-S8-4.jpg',
                    '/images/xiaomi.png',
                    '/images/moto.jpg',
                    '/images/iphone8.jpg',
                    '/images/nokia1.jpg'
                  ];
        $titles = ['Samsung 8 edgeless', 'Samsung 8', 'Nokia 5', 'Iphone 8', 'Sony Experia'];
        $descriptions = ['The latest smartphone.',
                        'The latest and powerful smartphone.',
                        'The latest and durable smartphone.',
                        'The latest and expensive smartphone.',
                        'The latest and quality smartphone.'
                       ];
        $prices = ['18','11','13','12','15'];
        $categories = ['1','4','3','4','3'];
        array_map(function ($image, $title, $description, $price, $category){
            $now = date('Y-m-d H:i:s', strtotime('now'));
            DB::table('products')->insert([
                'imagePath'=>$image,
                'created_at'=>$now,
                'updated_at'=>$now,
                'title'=> $title,
                'description'=>$description,
                'price'=>$price,
                'category_id'=>$category
            ]);
        }, $images, $titles, $descriptions, $prices, $categories);
    }
}
