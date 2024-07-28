<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
        }
        .mt-4 {
            margin-top: 1.5rem !important;
        }
        .card {
            margin-bottom: 1.5rem;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card-body p {
            margin-top: 0.5rem;
        }
        .icon {
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Konfirmasi Cara Anda Mendapatkan Pesanan</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="icon text-primary">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <a href="{{ route('delivery.index') }}" class="btn btn-primary mt-3">Delivery</a>
                        <p class="text-muted">Pesanan akan Kami Antarkan ke Rumahmu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="icon text-success">
                            <i class="fas fa-store"></i>
                        </div>
                        <a href="{{ route('pickup.index') }}" class="btn btn-success mt-3">Pickup</a>
                        <p class="text-muted">Ambil Pesanan Anda di Toko yaa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
