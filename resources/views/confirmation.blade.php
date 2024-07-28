<!-- resources\views\pickup\confirmation.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Konfirmasi Pengambilan</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .notification {
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .pickup-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
            font-size: 18px;
        }
        .note {
            text-align: center;
            margin: 20px 0;
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-light">
        <header class="bg-white shadow-sm">
            <div class="container py-4">
                <h2 class="text-center">Konfirmasi Pengambilan</h2>
            </div>
        </header>

        <main>
            <div class="py-6">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="notification">NOTIFIKASI</div>
                                    <div class="pickup-box">
                                        Anda Dapat Mengambil Pesanan Anda ke Toko pada Tanggal: <br>
                                        <strong>{{ \Carbon\Carbon::tomorrow()->format('d F Y') }}</strong>
                                        <div>
                                        Batas Waktu Pengambilan: <br>
                                        <strong>{{ \Carbon\Carbon::tomorrow()->addDay()->format('d F Y') }}</strong>
                                        </div>
                                    </div>
                                    <div class="note" style="font-style: italic; opacity: 1;">
                                        Pembayaran Dilakukan Saat Anda Mengambil Barang di Toko
                                    </div>
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-block mt-4">Selesai</a>
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
