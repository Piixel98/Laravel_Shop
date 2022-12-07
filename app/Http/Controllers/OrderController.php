<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Services\CartService;
use App\Models\OrderLine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request, CartService $cartService): JsonResponse
    {
        // Create a new order with all fields passed in request
        $order = new Order();
        $order->fill($request->all())->save();
        $order = $order->refresh();

        // Get cart and for each item
        $cart = $cartService->getCart();
        foreach ($cart as $itemCart){
            // Obtain new stock
            $finalStock = $itemCart->product->stock -$itemCart->quantity;

            // Update stock from product
            $itemCart->product->update([
                'stock'=>($finalStock)
            ]);
            $itemCart->product->refresh();

            // Create orderline
            $orderLine = new OrderLine([
                "sku" => $itemCart->product->sku,
                "quantity" => $itemCart->quantity,
                "price" => $itemCart->product->price,
            ]);
            $orderLine->product()->associate($itemCart->product);
            $orderLine->order()->associate($order);
            $orderLine->save();
        }
        // Clear all items in cart
        $cartService->clearCart();

        return new JsonResponse($order,201);
    }
}

