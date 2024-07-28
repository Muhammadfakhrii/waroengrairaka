<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index()
    {
        return view('delivery.index');
    }

    public function showSummary()
    {
        // Ambil data user dari database (misalnya user yang sedang login)
        $user = Auth::user();

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Hitung total pembayaran
        $totalPembayaran = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Kirim data ke view summary.blade.php
        return view('delivery.summary', [
            'user' => $user,
            'cart' => $cart,
            'totalPembayaran' => $totalPembayaran,
        ]);
    }
}
