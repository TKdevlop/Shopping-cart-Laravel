<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'https://www.mysmartprice.com/gear/wp-content/uploads/2018/07/Mi-A2-Images-696x435.png',
            'title' => 'Poco Phone',
            'description' => 'Flagship phone at cheap price',
            'price'=> 299.99

        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://www.mysmartprice.com/gear/wp-content/uploads/2018/07/Mi-A2-Images-696x435.png',
            'title' => 'Poco Phone',
            'description' => 'Flagship phone at cheap price',
            'price'=> 299.99

        ]);
        $product->save(); $product = new \App\Product([
            'imagePath' => 'https://www.mysmartprice.com/gear/wp-content/uploads/2018/07/Mi-A2-Images-696x435.png',
            'title' => 'Poco Phone',
            'description' => 'Flagship phone at cheap price',
            'price'=> 299.99

        ]);
        $product->save(); $product = new \App\Product([
            'imagePath' => 'https://www.mysmartprice.com/gear/wp-content/uploads/2018/07/Mi-A2-Images-696x435.png',
            'title' => 'Poco Phone',
            'description' => 'Flagship phone at cheap price',
            'price'=> 299.99

        ]);
        $product->save(); $product = new \App\Product([
            'imagePath' => 'https://www.mysmartprice.com/gear/wp-content/uploads/2018/07/Mi-A2-Images-696x435.png',
            'title' => 'Poco Phone',
            'description' => 'Flagship phone at cheap price',
            'price'=> 299.99

        ]);
        $product->save();
    }
}
