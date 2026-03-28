<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    // 1. Hiển thị danh sách (Read All)
    public function index() {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // 2. Form tạo mới
    public function create() {
        return view('books.create');
    }

    // 3. Lưu vào DB (Create)
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|max:255',
            'author' => 'nullable|max:150',
            'price' => 'required|numeric',
            'stock' => 'integer',
            'img' => 'nullable|max:200',
            'description' => 'nullable'
        ]);
        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Thêm sách thành công!');
    }

    // 4. Form chỉnh sửa
    public function edit(Book $book) {
        return view('books.edit', compact('book'));
    }

    // 5. Cập nhật dữ liệu (Update)
    public function update(Request $request, Book $book) {
        $data = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            // ... thêm các validate khác tương tự store
        ]);
        $book->update($data);
        return redirect()->route('books.index')->with('success', 'Cập nhật thành công!');
    }

    // 6. Xóa (Delete)
    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Đã xóa sách!');
    }
}
?>