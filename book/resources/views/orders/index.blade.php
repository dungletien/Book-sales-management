<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Order List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="m-0">Order List</h4>
                        <a href="{{ url('/dashboard') }}" class="btn btn-md btn-secondary me-3">Back to Dashboard</a>
                </div>

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('orders.create') }}" class="btn btn-md btn-success mb-3 float-end">New
                            Order</a>

                        <table class="table table-bordered mt-1 text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID Oder</th>
                                    <th scope="col">Book</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->book->title }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ number_format($order->total_price, 2) }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Bạn có chắc chắn không?');"
                                                action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                <a href="{{ route('orders.edit', $order->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="5">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
