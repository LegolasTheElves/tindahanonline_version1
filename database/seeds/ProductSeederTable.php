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
        /*$product = new \App\Product([
            'imagePath' => 'iphone.jpg',
            'title' => 'Xiaome Mi Mix',
            'description' => 'The latest edgeless smartphone.',
            'price' => 10
        ]);
        $product ->save();*/
        
        $images = [ '/images/sony.jpg',
                    '/images/xiaomi.png',
                    '/images/moto.jpg',
                    '/images/iphone8.jpg',
                    '/images/nokia1.jpg'
                  ];
        $titles = ['Xiaome Mi Mix', 'Samsung 8', 'Nokia 5', 'Iphone 8', 'Sony Experia'];
        $descriptions = ['The latest edgeless smartphone.',
                        'The latest and powerful smartphone.',
                        'The latest and durable smartphone.',
                        'The latest and expensive smartphone.',
                        'The latest and quality smartphone.'
                       ];
        $prices = ['10','11','13','12','15'];
        array_map(function ($image, $title, $description, $price){
            $now = date('Y-m-d H:i:s', strtotime('now'));
            DB::table('products')->insert([
                'imagePath'=>$image,
                'created_at'=>$now,
                'updated_at'=>$now,
                'title'=> $title,
                'description'=>$description,
                'price'=>$price
            ]);
        }, $images, $titles, $descriptions, $prices);
        
    }
}
