<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Orders;
use App\Models\Cart;


class CheckoutController extends Controller
{


    public function checkout(Request $request)
{
    $cartItems = json_decode($request->input('order_data'));


    if (empty($cartItems)) {
        return Redirect::route('cart')->with('error', 'Your cart is empty. Please add items before checking out.');
    }

    $orderData = [];
    foreach ($cartItems as $item) {
        $orderData[] = [
            'product_name' => $item->product_name,
            'quantity' => $item->quantity,
            'price' => $item->price
        ];
    }

    $grandTotal = $request->input('grand_total');
    $userId = Auth::id();

    $order = new Orders();
    $order->name = json_encode($orderData);
    $order->total = $grandTotal;
    $order->status = 'Pending';
    $order->user_id = $userId;
    $order->save();

    Cart::where('user_id', $userId)->delete();

    return Redirect::route('cart')->with('success', 'Order created successfully');
}



}
