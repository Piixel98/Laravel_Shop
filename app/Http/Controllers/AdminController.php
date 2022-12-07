<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function main(): View
    {
        // Return a view admin passing categories, products and orders
        return view('pages.admin.admin',
            [
                "categories"=>Category::paginate($perPage = 5, $columns = ['*'], $pageName = 'category'),
                "products"=>Product::paginate($perPage = 5, $columns = ['*'], $pageName = 'product'),
                "orders"=>Order::paginate($perPage = 5, $columns = ['*'], $pageName = 'order')
            ]);
    }

}
