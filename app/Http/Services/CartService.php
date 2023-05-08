<?php

namespace App\Http\Services;

use App\Models\Product;

class CartService
{
    private array $cart = [];

    public function __construct()
    {
        if(!session()->has("cart")) {
            $this->overrideSession();
        }
        else{
            $this->cart = session("cart");
        }

    }

    public function getCart()
    {
        return $this->cart;
    }

    public function getTotal()
    {
        // Get total of cart adding quantity * price of each product
        $totalPrice = 0.0;
        foreach ($this->cart as $item){
            $totalPrice+=($item->quantity * $item->product->price);
        }
        return $totalPrice;
    }

    public function findProduct(int $idProduct)
    {
        // Check if idProduct exists in cart and returns his key
        $p = null;
        if (count($this->cart)===0) return null;
        foreach($this->cart as $key => $value){
            if ($value->productId == $idProduct){
                $p = $key;
            }

        }
        return $p;
    }

    public function addProduct(int $idProduct, int $quantity): bool
    {
        // Find product by idProduct if exists
        $product = Product::query()->find($idProduct);
        if ($product){
            // Find product by idProduct in cart
            $i = $this->findProduct($idProduct);
            if($i !== null){
                // If exists in car set new variables
                $this->cart[$i]->product = $product;
                $this->cart[$i]->quantity = $quantity;
            }else{
                // If not exists in car create a new item
                $item = (object)[
                    'productId'=>$idProduct,
                    'product'=>$product,
                    'quantity' => $quantity
                ];
                $this->cart[] = $item;
            }
            // Override session cart with new cart
            $this->overrideSession();
            return true;
        }
        return false;
    }

    public function delProduct(int $idProduct): bool
    {
        // Find a product by idProduct if exists
        $product = Product::query()->find($idProduct);
        if($product){
            // Find a product by idProduct in cart
            $key = $this->findProduct($idProduct);
            if($key !== null){
                // If exists delete product from cart
                unset($this->cart[$key]);
                $this->overrideSession();
                return true;
            }
        }
        return false;
    }

    public function clearCart(): void
    {
        if(session()->has("cart")){
            // Override session cart with empty list
            session()->put("cart",[]);
            session()->save();
        }
    }

    public function overrideSession(): void
    {
        // Override session cart with new cart
        session()->put("cart",$this->cart);
        session()->save();
    }
}
