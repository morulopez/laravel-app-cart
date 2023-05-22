<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $product = new \App\Models\Product();
        $product->sku = 'apple';
        $product->name ='an apple';
        $product->description = 'an apple that is delightful to behold';
        $product->price=0.40;
        $product->img="https://www.georgeperry.co.uk/images/P/pink-lady.jpg";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'banana';
        $product->name ='a banana';
        $product->description = 'a yellow banana';
        $product->price=0.90;
        $product->img="https://cloudfront-us-east-1.images.arcpublishing.com/semana/LQYEQRID3REUJGNBB23BW2C3FY.jpg";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'bowl';
        $product->name ='a fruit bowl';
        $product->description = 'a bowl that is ideal for holding fruit';
        $product->price=2.60;
        $product->img="https://api-prod.royaldesign.se/api/products/image/6/design-house-stockholm-blond-soup-bowl-60-cl-stripes-6";
        $product->save();

    }
}
