<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class CartController extends Controller
{
    public function show()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        $subTotal = $cartItems->sum('total');
        $grandTotal = $subTotal;

        return view('user.cart', compact('cartItems', 'subTotal', 'grandTotal'));
    }


    public function addToCart(Request $request)
{
    $productId = $request->input('productId');
    $quantity = $request->input('quantity');
    $userId = $request->user()->id;

    $cartItem = Cart::where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->first();

    if ($cartItem) {
        $cartItem->quantity += $quantity;
        $cartItem->total = $cartItem->price * $cartItem->quantity;
        $cartItem->save();
    } else {
        $productImage = $request->input('productImage');
        $productName = $request->input('productName');
        $productPrice = $request->input('productPrice');
        $total = $productPrice * $quantity;

        Cart::create([
            'image' => $productImage,
            'product_id' => $productId,
            'product_name' => $productName,
            'price' => $productPrice,
            'quantity' => $quantity,
            'total' => $total,
            'user_id' => $userId,
        ]);
    }

    return Redirect::route('cart')->with('success', 'Product added to cart successfully');
}


public function removeItem($id)
{
    $cartItem = Cart::find($id);

    if (!$cartItem) {
        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    $cartItem->delete();

   return Redirect::route('cart')->with('success', 'Item removed from cart.');
}


public function updateCartItem(Request $request, $id)
{
    $cartItem = Cart::findOrFail($id);

    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $cartItem->quantity = $request->input('quantity');
    $cartItem->total = $cartItem->price * $cartItem->quantity;
    $cartItem->save();

    return redirect()->route('cart')->with('success', 'Cart item quantity updated successfully.');
}

}


