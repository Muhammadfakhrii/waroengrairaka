<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Pembayaran Pengiriman</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Sesuaikan dengan gaya yang Anda inginkan */
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-light">
        <header class="bg-white shadow-sm">
            <div class="container py-4">
                <h2 class="text-center">Pembayaran Pengiriman</h2>
            </div>
        </header>

        <main>
            <div class="py-6">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Subtotal -->
                                    <div class="mb-4">
                                        <p>Subtotal: <span class="float-right">Rp {{ number_format($subtotal, 0, ',', '.') }}</span></p>
                                    </div>

                                    <!-- Biaya Layanan -->
                                    <div class="mb-4">
                                        <p>Biaya Layanan: <span class="float-right">Rp 5.000</span></p>
                                    </div>

                                    <!-- Total Pembayaran -->
                                    <div class="mb-4">
                                        <p>Total Pembayaran: <span class="float-right">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</span></p>
                                    </div>

                                    <!-- Form Pembayaran -->
                                    <form action="{{ route('payment.processDelivery') }}" method="POST">
                                        @csrf
                                        <!-- Isi dengan detail form pembayaran yang Anda butuhkan -->
                                        <button type="submit" class="btn btn-primary">Bayar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
