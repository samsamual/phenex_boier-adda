<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function removeFromCart(Request $request)
    {
        if (!Session::has('session_id')) {
            Session::put('session_id', session()->getId());
        }
        $session_id = Session::get('session_id');
        $user_id = Auth::id() ?? 0;

        $cart = Cart::where('id', $request->cart)
            ->where(function($query) use ($session_id, $user_id) {
                $query->where('session_id', $session_id);
                if ($user_id) {
                    $query->orWhere('user_id', $user_id);
                }
            })
            ->first();

        if (!$cart) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Item not found in cart!',
                ]);
            }
            return back()->with('error', 'Item not found in cart!');
        }

        $cart->delete();

        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => 'Item removed from cart!',
                'cart_id' => $request->cart,
                'cartCount' => Cart::cartCount(),
                'cartItemsCount' => Cart::CartItemsCount(),
                'cartTotal' => Cart::totalCartPrice(),
                'add_to_cart_url' => route('addToCart'),
            ]);
        }

        return back()->with('success', 'Item removed from cart!');
    }
}
