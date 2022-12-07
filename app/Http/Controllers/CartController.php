<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CartController extends Controller
{
    public function getCart(CartService $cartService) : View
    {
        // Return view cart with total and cart
        $total = $cartService->getTotal();
        $cart = $cartService->getCart();
        return view('pages.cart.cart',['cart'=>$cart,'total'=>$total]);
    }

    public function getCheckout(Request $request, CartService $cartService) : View
    {
        // Return view checkout with total and cart
        $total = $cartService->getTotal();
        $cart = $cartService->getCart();
        return view('pages.checkout.checkout',['cart'=>$cart, 'total'=>$total]);
    }

    public function addProduct(Request $request, int $idProduct, CartService $cartService): RedirectResponse
    {
        // Add product calling CartService with idProduct and category passed by queryParam
        $quantity = $request->query('quantity',null);
        if ($quantity === null) {
            return Redirect::back()->with('warning','Quantity is necessary-');
        }
        // Find product by idProduct
        $product = Product::query()->find($idProduct);
        if ($product) {
            // Check stock if available
            if ($product->stock - (int)$quantity < 0){
                return Redirect::back()->with('warning','Not enough stock.');
            } else{
                // If stock add product to cart
                if($cartService->addProduct($idProduct, (int)$quantity)){
                    return Redirect::back()->with('success','Product added successfully.');
                }
            }
        }
        return Redirect::back()->with('error','Error adding product');
    }

    public function delProduct(int $idProduct,CartService $cartService): RedirectResponse
    {
        // Delete product calling Cart service by idProduct
        $product = Product::query()->find($idProduct);
        if ($product) {
            if ($cartService->delProduct($idProduct)) {
                return Redirect::back()->with('success', 'Product deleted successfully from cart');
            }
        }
        return Redirect::back()->with('error','Error deleting product from cart');
    }
}
