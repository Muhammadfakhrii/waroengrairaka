<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Ionicons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/collection/components/icon/icon.min.css" rel="stylesheet">
    <style>
        .card-body {
            padding-left: 20px;
            padding-right: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-back {
            position: absolute;
            top: 10px;
            left: 10px;
            background: none;
            border: none;
            color: #000;
        }
        .product-card {
            position: relative;
        }
        .card-img-top {
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card product-card">
                    <a href="{{ route('products.show', $product->id) }}">
                        <img src="{{ asset('storage/'.$product->image_url) }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
                    </a>
                    <button class="btn-back" onclick="window.history.back()">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </button>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary d-block">BELI</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
