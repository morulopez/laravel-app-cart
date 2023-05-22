<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $product = new \App\Models\Product();
        $product->sku = 'avocado';
        $product->name ='an avocado';
        $product->description = 'an avocado that is delightful to behold';
        $product->price=1.40;
        $product->img="https://cdn.britannica.com/72/170772-050-D52BF8C2/Avocado-fruits.jpg";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'lemon';
        $product->name ='a lemon';
        $product->description = 'a yellow lemon';
        $product->price=0.90;
        $product->img="https://www.herbazest.com/imgs/3/f/2/9710/lemon.jpg";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'asparagus';
        $product->name ='a asparagus';
        $product->description = 'fresh cut asparagus';
        $product->price=2.60;
        $product->img="https://images.immediate.co.uk/production/volatile/sites/30/2023/03/Asparagus-spears-57ba27e.jpg?quality=90&resize=440,400";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'melon';
        $product->name ='a melon';
        $product->description = 'melon in summer time';
        $product->price=5.40;
        $product->img="https://s3.abcstatics.com/media/bienestar/2022/08/16/melones-2-klj--620x349@abc.jpg";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'watter melon';
        $product->name ='a watter melon';
        $product->description = 'a watter melon in summer time';
        $product->price=6.90;
        $product->img="https://cdn.shopify.com/s/files/1/0348/7465/4764/products/Watermelon_609x.png?v=1591729943";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'barbecue';
        $product->name ='a barbecue';
        $product->description = 'grill your meats on this barbecue';
        $product->price=50.60;
        $product->img="https://i.ebayimg.com/images/g/le4AAOSw9GdcmyHH/s-l1600.jpg";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'tomatoes';
        $product->name ='a tomatoes';
        $product->description = 'fresh tomatoes';
        $product->price=2.40;
        $product->img="https://post.healthline.com/wp-content/uploads/2020/09/AN313-Tomatoes-732x549-Thumb.jpg";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'coal';
        $product->name ='a coal';
        $product->description = 'a for barbacue';
        $product->price=4.90;
        $product->img="https://media.istockphoto.com/id/1150246685/photo/charcoal-in-a-paper-bag-for-igniting-fire-in-a-grill.jpg?s=612x612&w=0&k=20&c=xW5SvnmjeYL5XKIg8TVZqFglPZJMY15d8ogwH1P6dlw=";
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'ribs';
        $product->name ='a ribs';
        $product->description = 'ribs for grill in your barbecue';
        $product->price=15.60;
        $product->img="https://www.bhg.com/thmb/jcFaaDJ7FEdWPtMZW_UhC3D0Obo=/1500x0/filters:no_upscale():strip_icc()/how-to-cook-pork-ribs-oven-slow-cooker-grill-01-hero-9e9a8b96cc144a84a9aaca2dcf354a03.jpg";
        $product->save();
    }
}
