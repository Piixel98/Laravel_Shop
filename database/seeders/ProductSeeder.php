<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = new Product([
            'name' => 'Airpods White',
            'description' => 'Airpods Blank 2022',
            'image' => '/img/product-1.jpg',
            'sku' => 'COD000001',
            'price' => 99.9,
            'stock' => 10
        ]);
        $product1->save();
        $product1->categories()->save(Category::query()->find(9));

        $product2 = new Product([
            'name' => 'Red Nike Jordan',
            'description' => 'Red Jordan Air 12',
            'image' => '/img/product-2.jpg',
            'sku' => 'COD000002',
            'price' => 200,
            'stock' => 5
        ]);
        $product2->save();
        $product2->categories()->save(Category::query()->find(6));

        $product3 = new Product([
            'name' => 'Blue T-Shirt Unisex',
            'description' => 'Blue standard T-Shirt',
            'image' => '/img/product-3.jpg',
            'sku' => 'COD000003',
            'price' => 35,
            'stock' => 2
        ]);
        $product3->save();
        $product3->categories()->save(Category::query()->find(4));


        $product4 = new Product([
            'name' => 'Timex Unisex Originals',
            'description' => null,
            'image' => '/img/product-4.jpg',
            'sku' => 'COD000004',
            'price' => 100,
            'stock' => 7
        ]);
        $product4->save();
        $product4->categories()->save(Category::query()->find(11));

        $product5 = new Product([
            'name' => 'Red Smartwatch',
            'description' => 'Smartwatch 2022',
            'image' => '/img/product-5.jpg',
            'sku' => 'COD000005',
            'price' => 185,
            'stock' => 10
        ]);
        $product5->save();
        $product5->categories()->save(Category::query()->find(10));

        $product6 = new Product([
            'name' => 'Polaroid Camera',
            'description' => 'Camera Polaroid 2022',
            'image' => '/img/product-10.jpg',
            'sku' => 'COD000006',
            'price' => 150,
            'stock' => 12
        ]);
        $product6->save();
        $product6->categories()->save(Category::query()->find(3));
    }
}
