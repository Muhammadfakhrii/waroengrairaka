<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showDeliveryPaymentPage(Request $request)
    {
        // Contoh mengambil data cart dari session
        $cart = session()->get('cart', []);

        // Hitung subtotal dari cart
        $subtotal = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Hitung biaya layanan misalnya
        $biayaLayanan = 5000; // Misalnya biaya layanan adalah Rp 5.000

        // Kirim data ke view
        return view('paymentdelivery', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'totalPembayaran' => $subtotal + $biayaLayanan,
        ]);
    }

    // Metode untuk proses pembayaran pengiriman
    public function processDeliveryPayment(Request $request)
    {
        // Logika untuk proses pembayaran pengiriman
        // Contoh: Menyimpan data transaksi, mengirim email, dll.

        return redirect()->route('confirmation.delivery'); // Ganti dengan rute konfirmasi atau halaman selesai
    }

    public function showPickupPaymentPage(Request $request)
    {
        // Contoh mengambil data cart dari session
        $cart = session()->get('cart', []);

        // Hitung subtotal dari cart
        $subtotal = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Kirim data ke view
        return view('paymentpickup', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'totalPembayaran' => $subtotal, // Misalnya tidak ada biaya tambahan untuk pickup
        ]);
    }

    // Metode untuk proses pembayaran pickup
    public function processPickupPayment(Request $request)
    {
        // Logika untuk proses pembayaran pickup
        // Contoh: Menyimpan data transaksi, mengirim email, dll.

        return redirect()->route('confirmation'); // Ganti dengan rute konfirmasi atau halaman selesai
    }

}
