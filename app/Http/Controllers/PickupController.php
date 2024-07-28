<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PickupController extends Controller
{
    public function show()
    {
        return view('pickup.index');
    }

    public function showRingkasan()
    {
        $user = Auth::user();

        $cart = session()->get('cart', []);

        // Hitung total pembayaran
        $totalPembayaran = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Kirim data ke view ringkasan.blade.php
        return view('pickup.ringkasan', [
            'user' => $user,
            'cart' => $cart,
            'totalPembayaran' => $totalPembayaran,
        ]);
    }
    public function index()
        {
            return view('pickup.index');
        }
}
