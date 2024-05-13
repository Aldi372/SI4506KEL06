<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Promo; 
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        $promos = Promo::all(); // Fetch all available promos
        return view('cart.index', compact('cartItems', 'promos'));
    }
    public function clearCart()
    {
        Cart::destroy(); // Menghapus semua item dari keranjang

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully');
    }

    
    

}