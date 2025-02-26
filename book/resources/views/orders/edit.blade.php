<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4>Edit Order</h4>

                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <form action="{{ route('orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- ID không thể chỉnh sửa -->
                            <div class="mb-3">
                                <label for="id">Order ID</label>
                                <input type="text" class="form-control" name="id" value="{{ $order->id }}" disabled>
                            </div>

                            <!-- Chọn sách (nếu muốn thay đổi) -->
                            <div class="mb-3">
                                <label for="book_id">Book</label>
                                <select class="form-control @error('book_id') is-invalid @enderror" name="book_id" required>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}" {{ $order->book_id == $book->id ? 'selected' : '' }}>
                                            {{ $book->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('book_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Số lượng sách -->
                            <div class="mb-3">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    name="quantity" value="{{ old('quantity', $order->quantity) }}" required>
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Giá sách (nếu có) -->
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address', $order->address) }}" required>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nút cập nhật -->
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-md btn-secondary">Back</a>

                        </form>
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
