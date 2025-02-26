<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create New Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                <h4>Create New Order</h4>
                
                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="book_id">Book</label>
                                <select class="form-control @error('book_id') is-invalid @enderror" name="book_id"
                                    required>
                                    <option value="">Select a book</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                                @error('book_id')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    name="quantity" value="{{ old('quantity') }}" required>

                                @error('quantity')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required>

                                @error('address')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">Save</button>
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
