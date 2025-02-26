<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

            <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="m-0">Book List</h4>
                        <a href="{{ url('/dashboard') }}" class="btn btn-md btn-secondary me-3">Back to Dashboard</a>
                </div>

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('books.create') }}" class="btn btn-md btn-success mb-3 float-end">New
                            book</a>

                        <table class="table table-bordered mt-1 text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID Book</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->quantity }}</td>
                                        <td>{{ $book->price }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Bạn có chắc chắn không?');"
                                                action="{{ route('books.destroy', $book->id) }}" method="POST">
                                                <a href="{{ route('books.edit', $book->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data book</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $books->links() }}
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
