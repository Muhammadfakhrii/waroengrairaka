<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-left {
            display: flex;
            align-items: center;
        }
        .header-left button {
            margin-right: 10px;
        }
        .header-right {
            display: flex;
            align-items: center;
        }
        .header-right button {
            margin-left: 10px;
        }
        .next-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="header-buttons">
            <div class="header-left">
                <button onclick="window.location.href='/dashboard'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="20" height="20">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" d="M249.38 336L170 256l79.38-80M181.03 256H342"/>
                        <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="24"/>
                    </svg>
                </button>
            </div>

            <h1>Keranjang Belanja</h1>
            <div class="header-right">
                <a href="{{ route('confirm.index') }}" class="btn btn-warning ml-2">Delivery</a>
                <a href="{{ route('confirm.index') }}" class="btn btn-warning ml-2">Pickup</a>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mt-3">
            @if(count($cart) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"><label for="select-all" class="ml-2"></label></th>
                            <th>Produk</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Hapus Semua</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $productId => $item)
                            @php
                                $quantity = $item['quantity'];
                                $price = $item['price'];
                                $subtotal = $price * $quantity;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td><input type="checkbox" name="checklist" value="{{ $productId }}"></td>
                                <td><img src="{{ asset('storage/' . ($item['image_url'] ?? '')) }}" alt="{{ $item['name'] }}" width="50"></td>
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    <button class="btn btn-sm btn-secondary" onclick="kurangiJumlah('{{ $productId }}')">-</button>
                                    <span id="quantity-{{ $productId }}">{{ $quantity }}</span>
                                    <button class="btn btn-sm btn-secondary" onclick="tambahJumlah('{{ $productId }}')">+</button>
                                </td>
                                <td>Rp {{ number_format($price, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="hapusProduk('{{ $productId }}')">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-right"><strong>Total Pembayaran:</strong></td>
                            <td> <strong>Rp </strong><strong id="total">{{ number_format($total, 0, ',', '.') }}</strong></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p>Keranjang Anda kosong.</p>
            @endif
        </div>
    </div>

    <div class="next-button">
        @if(count($cart) > 0)
            <a href="{{ route('confirm.index') }}" class="btn btn-primary">Selanjutnya</a>
        @else
            <a href="/dashboard" class="btn btn-primary">Kembali ke Dashboard</a>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        document.getElementById('select-all').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('input[name="checklist"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });

        function hapusProduk(productId) {
            fetch('{{ route('cart.remove') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Optional: Show a message or update UI
                location.reload(); // Reload the page or update the cart UI dynamically
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function tambahJumlah(productId) {
            fetch('{{ route('cart.updateQuantity') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: parseInt(document.getElementById('quantity-' + productId).textContent) + 1
                })
            })
            .then(response => response.json())
            .then(data => {
                // Update UI or handle response as needed
                console.log(data);
                // Optional: Update quantity in UI
                document.getElementById('quantity-' + productId).textContent = parseInt(document.getElementById('quantity-' + productId).textContent) + 1;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function kurangiJumlah(productId) {
            var currentQuantity = parseInt(document.getElementById('quantity-' + productId).textContent);
            if (currentQuantity > 1) {
                fetch('{{ route('cart.updateQuantity') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: currentQuantity - 1
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Update UI or handle response as needed
                    console.log(data);
                    // Optional: Update quantity in UI
                    document.getElementById('quantity-' + productId).textContent = currentQuantity - 1;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>
