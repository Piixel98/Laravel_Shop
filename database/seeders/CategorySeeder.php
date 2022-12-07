<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Main categories
        $category1 = new Category([
            'name' => 'FASHION & ACC',
            'parentId' => null,
            'isParent' => true,
            'status' => 'active',
            'description' => null,
            'photo' => '/public/img/categories_1.jpg'
        ]);
        $category1->save();

        $category2 = new Category([
            'name' => 'HEALTH & BEAUTY',
            'parentId' => null,
            'isParent' => true,
            'status' => 'active',
            'description' => null,
            'photo' => '/public/img/categories_2.jpg'
        ]);
        $category2->save();

        $category3 = new Category([
            'name' => 'ELECTRONICS',
            'parentId' => null,
            'isParent' => true,
            'status' => 'active',
            'description' => null,
            'photo' => '/public/img/categories_2.jpg'
        ]);
        $category3->save();

        // SubCategories
        // FASHION & ACC
        $category4 = new Category([
            'name' => 'T-Shirts',
            'parentId' => 1,
            'isParent' => false,
            'status' => 'active',
            'description' => null,
            'photo' => '/public/img/product-3.jpg'
        ]);
        $category4->save();

        $category5 = new Category([
            'name' => 'Sunglasses',
            'parentId' => 1,
            'isParent' => false,
            'status' => 'active',
            'description' => null,
            'photo' => '/public/img/product-3.jpg'
        ]);
        $category5->save();

        $category6 = new Category([
            'name' => 'Sneakers',
            'parentId' => 1,
            'isParent' => false,
            'status' => 'active',
            'description' => null,
            'photo' => null
        ]);
        $category6->save();

        // HEALTH & BEAUTY
        $category7 = new Category([
            'name' => 'Shavers',
            'parentId' => 2,
            'isParent' => false,
            'status' => 'active',
            'description' => null,
            'photo' => null
        ]);
        $category7->save();

        $category8 = new Category([
            'name' => 'Cosmetics',
            'parentId' => 2,
            'isParent' => false,
            'status' => 'active',
            'description' => null,
            'photo' => null
        ]);
        $category8->save();

        // ELECTRONICS
        $category9 = new Category([
            'name' => 'Headphones',
            'parentId' => 3,
            'isParent' => false,
            'status' => 'active',
            'description' => null,
            'photo' => null
        ]);
        $category9->save();

        $category10 = new Category([
            'name' => 'Smartwatches',
            'parentId' => 3,
            'isParent' => false,
            'status' => 'active',
            'description' => null,
            'photo' => null
        ]);
        $category10->save();

        $category11 = new Category([
            'name' => 'Watches',
            'parentId' => 2,
            'isParent' => false,
            'status' => 'inactive',
            'description' => null,
            'photo' => null
        ]);
        $category11->save();
    }
}
