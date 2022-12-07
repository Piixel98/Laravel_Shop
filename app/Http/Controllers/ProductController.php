<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getByCategory(Request $request): View
    {
        // Return a View products with products in category passed in queryParam
        $idCategory = $request->query("category");
        if ($idCategory == null) {
            return view('pages.products.products',
                ["products" => Product::all(),
                    "categoryId" => null,
                    "categories" => Category::all()]);
        } else{
            return view('pages.products.products',
                ["products"=>Category::query()->find($idCategory)->products(),
                    "categoryId" => Category::query()->find($idCategory)->id,
                    "categories" => Category::all()]);
        }
    }

    public function getDetail(Request $request): View
    {
        // Return a view detail with product passed by queryParam
        $idProduct = $request->query("id");
        if ($idProduct == null) {
            $product = Product::query()->find(1);
        } else{
            $product = Product::query()->find($idProduct);
        }
        return view('pages.detail.detail')->with('product', $product);
    }
}
