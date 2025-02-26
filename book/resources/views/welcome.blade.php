<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookStore Manager - Hệ thống quản lý bán sách</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS từ CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        .bg-bookshelf {
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="bg-bookshelf text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    <!-- Overlay -->
    <div class="overlay flex-grow flex flex-col">
        <!-- Header -->
        <header class="bg-transparent py-6">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="https://plus.unsplash.com/premium_photo-1669652639337-c513cc42ead6?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="BookStore Manager Logo" class="h-10 w-10 rounded-full bg-white p-1">
                    <h1 class="ml-3 text-2xl font-bold text-white">BookStore Manager</h1>
                </div>

            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl w-full text-center text-white">
                <h2 class="text-4xl sm:text-5xl font-extrabold mb-6 leading-tight">Quản lý bán sách chưa từng dễ dàng đến thế</h2>
                <p class="text-lg sm:text-xl mb-8 opacity-90">
                    BookStore Manager giúp bạn quản lý tồn kho, đơn hàng và doanh thu một cách hiệu quả. Hãy bắt đầu ngay hôm nay!
                </p>
                <div class="flex justify-center space-x-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-white text-gray-900 px-8 py-4 rounded-full font-semibold text-lg transition hover:bg-gray-200 shadow-lg">
                            Vào Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-white text-gray-900 px-8 py-4 rounded-full font-semibold text-lg transition hover:bg-gray-200 shadow-lg">
                            Đăng nhập ngay
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg transition hover:bg-white hover:text-gray-900 shadow-lg">
                                Tạo tài khoản
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 py-4">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400 text-sm">
            <p>BookStore Manager - Hệ thống quản lý bán sách</p>
        </div>
    </footer>
</body>
</html>
