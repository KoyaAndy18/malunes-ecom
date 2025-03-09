<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
    
        // Debugging log
        \Log::info('Add to Cart Request:', $request->all());
    
        if (!isset($request->id)) {
            return response()->json(['success' => false, 'message' => 'Product ID is required.']);
        }
    
        $id = $request->id;
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'id' => $id, // ✅ Ensure ID is stored
                'title' => $request->title ?? 'Unknown',
                'price' => $request->price ?? 0,
                'quantity' => 1,
                'image' => $request->image ?? 'default.jpg',
            ];
        }
    
        session()->put('cart', $cart);
    
        return response()->json(['success' => true, 'cart' => $cart]);
    }
    

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Item removed from cart!');
    }
}