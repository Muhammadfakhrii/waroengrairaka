<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')  <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h4>{{ $product->name }}</h4>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <!-- Tambahkan tombol-tombol lain sesuai kebutuhan -->
                                </div>
                                <small class="text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
