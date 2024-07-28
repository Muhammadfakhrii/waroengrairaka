<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <style>
        .product-image {
            width: 80%;
            height: auto;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2rem;
            color: #000;
            cursor: pointer;
        }
    </style>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 position-relative">
                <ion-icon name="arrow-back-circle-outline" class="back-button" onclick="window.history.back();"></ion-icon>
                <img src="{{ asset('storage/' . $product->image_url) }}" class="img-fluid product-image" alt="{{ $product->name }}">
                <div class="mt-3">
                    <h3>Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                    <p><strong>Stok:</strong> {{ $product->stock }}</p>
                    <input id="touchspin" type="text" value="1" name="quantity">
                    <form id="addToCartForm" action="{{ route('cart.add') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" id="quantity" value="1">
                        <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <h1>{{ $product->name }}</h1>
                <p><strong>Deskripsi Produk:</strong></p>
                <ul>
                    @foreach(explode("\n", $product->description) as $line)
                        <li>{{ $line }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#touchspin").TouchSpin({
                min: 1,
                max: {{ $product->stock }},
                step: 1,
                boostat: 5,
                maxboostedstep: 10,
                postfix: 'pcs'
            }).on('change', function() {
                $('#quantity').val($(this).val());
            });

            $("#addToCartForm").submit(function(e) {
                e.preventDefault(); // Prevent the default form submit

                // Submit the form via AJAX (optional)
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        // Redirect to cart page
                        window.location.href = "{{ route('cart.index') }}";
                    }
                });
            });
        });
    </script>
</body>
</html>
