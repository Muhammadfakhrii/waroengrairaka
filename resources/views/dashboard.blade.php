<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .category-button img {
                max-width: 30px;
                height: auto;
                margin-right: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Header: Search Bar, Categories -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <form action="{{ route('products.search') }}" method="GET" class="input-group">
                        <input id="searchInput" type="text" class="form-control" placeholder="Mau Cari Apa Nih?" name="query">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>

                </div>
                <div class="col-md-6 text-right">
                    <!-- Icon Keranjang -->
                    <a href="{{ route('cart.index') }}" class="btn btn-info ml-2">Keranjang <ion-icon name="cart-outline"></ion-icon></a>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="container">
                <div class="row mt-4">
                    <!-- Product 1 -->
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <a href="{{ route('products.show', 1) }}">
                                <img src="storage/images/gulaku.png" class="card-img-top img-fluid" alt="Product 1">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Gulaku Gula Pasir Tebu Kuning Berkualitas 1 kg</h5>
                                <p class="card-text">Rp 18.000</p>
                                <a href="{{ route('products.show', 1) }}" class="btn btn-primary d-block">BELI</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 2 -->
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <a href="{{ route('products.show', 2) }}">
                                <img src="storage/images/bebelac.png" class="card-img-top img-fluid" alt="Product 2">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Bebelac 4 GroGreat+ Susu Bubuk Rasa Vanila 1.8 kg</h5>
                                <p class="card-text">Rp 275.000</p>
                                <a href="{{ route('products.show', 2) }}" class="btn btn-primary d-block">BELI</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 3 -->
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <a href="{{ route('products.show', 3) }}">
                                <img src="storage/images/dettol.png" class="card-img-top img-fluid" alt="Product 3">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Dettol Sabun Mandi Cair Anti Bakteri Refill 800g</h5>
                                <p class="card-text">Rp 40.000</p>
                                <a href="{{ route('products.show', 3) }}" class="btn btn-primary d-block">BELI</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 4 -->
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <a href="{{ route('products.show', 4) }}">
                                <img src="storage/images/mamipoko.png" class="card-img-top img-fluid" alt="Product 4">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">MamyPoko Standar Popok Celana Bayi XL 6 pcs</h5>
                                <p class="card-text">Rp 18.000</p>
                                <a href="{{ route('products.show', 4) }}" class="btn btn-primary d-block">BELI</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 5 -->
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <a href="{{ route('products.show', 5) }}">
                                <img src="storage/images/sunlight.png" class="card-img-top img-fluid" alt="Product 5">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Sunlight Sabun Cuci Piring Jeruk Nipis Refill 210 ml</h5>
                                <p class="card-text">Rp 5.000</p>
                                <a href="{{ route('products.show', 5) }}" class="btn btn-primary d-block">BELI</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 6 -->
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <a href="{{ route('products.show', 6) }}">
                                <img src="storage/images/luwak.png" class="card-img-top img-fluid" alt="Product 6">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Luwak White Koffie Original Pet 220 ml </h5>
                                <p class="card-text">Rp 3.500</p>
                                <a href="{{ route('products.show', 6) }}" class="btn btn-primary d-block">BELI</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 7 -->
                    <div class="col-md-2 mb-4">
                        <a href="{{ route('products.show', 7) }}">
                            <img src="storage/images/ciki.png" class="img-fluid" alt="Product 7">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Chiki Twist Makanan Ringan Jagung Bakar 75 g</h5>
                            <p class="card-text">Rp 7.000</p>
                            <p class="text-center">
                                <a href="{{ route('products.show', 7) }}" class="btn btn-primary d-block">BELI</a>
                            </p>
                        </div>
                    </div>
                    <!-- Product 8 -->
                    <div class="col-md-2 mb-4">
                        <a href="{{ route('products.show', 8) }}">
                            <img src="storage/images/floridina.png" class="img-fluid" alt="Product 8">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Floridina Minuman Jeruk Asli Florida 350 ml</h5>
                            <p class="card-text">Rp 3.500</p>
                            <p class="text-center">
                                <a href="{{ route('products.show', 8) }}" class="btn btn-primary d-block">BELI</a>
                            </p>
                        </div>
                    </div>
                    <!-- Product 9 -->
                    <div class="col-md-2 mb-4">
                        <a href="{{ route('products.show', 9) }}">
                            <img src="storage/images/sasa.png" class="img-fluid" alt="Product 9">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Sasa Santan Kelapa Cair Kemasan Pouch 200 ml</h5>
                            <p class="card-text">Rp 10.000</p>
                            <p class="text-center">
                                <a href="{{ route('products.show', 9) }}" class="btn btn-primary d-block">BELI</a>
                            </p>
                        </div>
                    </div>
                    <!-- Product 10 -->
                    <div class="col-md-2 mb-4">
                        <a href="{{ route('products.show', 10) }}">
                            <img src="storage/images/nextar.png" class="img-fluid" alt="Product 10">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Nextar Brownies Cookies Cokelat 8 x 11.25 g</h5>
                            <p class="card-text">Rp 8.500</p>
                            <p class="text-center">
                                <a href="{{ route('products.show', 10) }}" class="btn btn-primary d-block">BELI</a>
                            </p>
                        </div>
                    </div>
                    <!-- Product 11 -->
                    <div class="col-md-2 mb-4">
                        <a href="{{ route('products.show', 11) }}">
                            <img src="storage/images/taro.png" class="img-fluid" alt="Product 11">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Taro Net Rumput Laut Camilan Harian 32 g</h5>
                            <p class="card-text">Rp 9.000</p>
                            <p class="text-center">
                                <a href="{{ route('products.show', 11) }}" class="btn btn-primary d-block">BELI</a>
                            </p>
                        </div>
                    </div>
                    <!-- Product 12 -->
                    <div class="col-md-2 mb-4">
                        <a href="{{ route('products.show', 12) }}">
                            <img src="storage/images/susu.png" class="img-fluid" alt="Product 12">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Indomilk Susu Kental Manis Putih Kemasan Kaleng 370g</h5>
                            <p class="card-text">Rp 12.000</p>
                            <p class="text-center">
                                <a href="{{ route('products.show', 12) }}" class="btn btn-primary d-block">BELI</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>
    </body>
    </html>
</x-app-layout>
