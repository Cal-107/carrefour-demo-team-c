<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('products');

        foreach ($products as $product) {
            $new_product = new Product();

            $new_product->name = $product['name'];
            $new_product->brand = $product['brand'];
            $new_product->description = $product['description'];
            $new_product->weight = $product['weight'];
            $new_product->price_per_kg = $product['price_per_kg'];
            $new_product->price = $product['price'];
            $new_product->slug = $product['slug'];
            $new_product->image = $product['image'];

            $new_product->save();
        }
    }
}