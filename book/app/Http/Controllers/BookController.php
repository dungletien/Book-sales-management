<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

// Controller cho books
class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index', compact('books'));
    }
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        //Book::create($request->all());

        $request->validate([
            'id' => 'required|string|max:10',
            'title' => 'required|string|max:255|',
            'price' => 'numeric',
            'quantity' => 'integer'
        ]);

        $book = Book::create([
            'id' => $request->id,
            'title' => $request->title,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);
        return redirect()->route('books.index')->with('message', 'Tạo sách mới thành công');
        ;

    }
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index')->with('message', 'Cập nhập sách thành công!');
        ;
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('message', 'Sách đã được xóa!');
        ;
    }
}

