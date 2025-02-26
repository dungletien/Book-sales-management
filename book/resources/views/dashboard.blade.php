<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <a href="{{ route('books.index') }}">
                    <div class="bg-white shadow-sm sm:rounded-lg p-6">
                        <h2 class="text-lg font-semibold text-gray-800">Books</h2>
                    </div>
                </a>

                <a href="{{ route('orders.index') }}">
                    <div class="bg-white shadow-sm sm:rounded-lg p-6">
                        <h2 class="text-lg font-semibold text-gray-800">Orders</h2>
                    </div>
                </a>

                <!-- Tổng doanh thu -->
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800">Tổng doanh thu</h2>
                    <p class="text-2xl font-bold text-red-600">{{ number_format($totalRevenue, 0, ',', '.') }} VNĐ</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>