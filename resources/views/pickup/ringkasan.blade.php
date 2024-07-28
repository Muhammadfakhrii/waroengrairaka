<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Page Heading -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Konfirmasi Pesanan Anda') }}
                </h2>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <!-- Main Content -->
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                            <!-- User Information -->
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Data Konsumen</h2>
                            <div class="py-2">
                                <p class="text-sm text-gray-700 dark:text-gray-300">Name: {{ $user->name }}</p>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Email: {{ $user->email }}</p>
                            </div>

                            <!-- Cart Summary -->
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-200 mt-4">Cart Summary</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white dark:bg-gray-800">
                                    <thead>
                                        <tr class="w-full bg-gray-100 dark:bg-gray-700">
                                            <th class="text-left py-2 px-3 border-b border-gray-300 dark:border-gray-600">Product Name</th>
                                            <th class="text-left py-2 px-3 border-b border-gray-300 dark:border-gray-600">Quantity</th>
                                            <th class="text-left py-2 px-3 border-b border-gray-300 dark:border-gray-600">Price</th>
                                            <th class="text-left py-2 px-3 border-b border-gray-300 dark:border-gray-600">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $item)
                                            <tr class="w-full border-b border-gray-300 dark:border-gray-600">
                                                <td class="py-2 px-3">{{ $item['name'] }}</td>
                                                <td class="py-2 px-3">{{ $item['quantity'] }}</td>
                                                <td class="py-2 px-3">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                                                <td class="py-2 px-3">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Total Payment -->
                            <div class="mt-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Total Payment: Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</h3>
                            </div>

                            <!-- Next Button -->
                            <div class="flex justify-center mt-6">
                                <a href="{{ route('payment.pickup') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Selanjutnya') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
