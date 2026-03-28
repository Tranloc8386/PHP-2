<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


// Đây là dòng "quyền năng" nhất: Tự động tạo ra 7 routes cho CRUD
Route::resource('books', BookController::class);
Route:: get('/', function () {
    return '';
});