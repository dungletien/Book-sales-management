<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Book;
// Controller cho orders
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));
    }
    public function create()
    {
        $books = Book::all();
        return view('orders.create', compact('books'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
        ]);

        $book = Book::find($request->book_id);
        if ($book->quantity < $request->quantity) {
            return back()->withErrors(['quantity' => 'Số lượng sách không đủ'])->withInput();
        }
        $order = Order::create([
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_price' => $book->price * $request->quantity,
            'address' => $request->address
        ]);
        $book->decrement('quantity', $request->quantity);
        return redirect()->route('orders.index')->with('message', 'Đơn hàng đã được tạo thành công!');

    }
    public function edit(Order $order)
    {

        $books = Book::all();

        return view('orders.edit', compact('order', 'books'));
    }
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
        ]);
        $book = Book::find($request->book_id);
        $oldQuantity = $order->quantity;
        $newQuantity = $request->quantity;

        if ($newQuantity > $oldQuantity) {
            // Nếu số lượng mới lớn hơn ban đầu, kiểm tra xem sách có đủ không
            $requiredBooks = $newQuantity - $oldQuantity; // Số lượng cần thêm
            if ($book->quantity < $requiredBooks) {
                return back()->withErrors(['quantity' => 'Số lượng sách không đủ'])->withInput();
            }
            // Trừ số sách từ kho
            $book->decrement('quantity', $requiredBooks);
        } elseif ($newQuantity < $oldQuantity) {
            // Nếu số lượng mới nhỏ hơn ban đầu, hoàn trả lại sách vào kho
            $returnedBooks = $oldQuantity - $newQuantity; // Số lượng trả lại
            $book->increment('quantity', $returnedBooks);
        }
        $order->update($request->all());
        return redirect()->route('orders.index')->with('message', 'Cập nhập đơn hàng thành công!');
        ;
    }
    public function destroy(Order $order)
    {
        $book = Book::find($order->book_id);

        if ($book) {
            $book->increment('quantity', $order->quantity);
        }
        $order->delete();

        return redirect()->route('orders.index')->with('message', 'Đơn hàng đã được xóa');
    }

}


