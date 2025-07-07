<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;


// Route::get("/", [CryptoController::class, 'getChartData']);

// Route::get("/", function () {
//     return view("home");
// });

Route::get("/", [NewsController::class, "index"])->name("home");

// Route::get("/view", function () {
//     return view("viewNews");
// });
Route::get("/viewNews/{id}", [NewsController::class, "viewNews"])->name("viewNews");

Route::get("/category", function () {
    return view("category");
});

Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/login', [UserController::class, 'loginAuth'])->name('login');
// logout route
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('upNews', function () {
    return view('upNews');
});
Route::post('/upNews', [NewsController::class, 'store'])->name('upNews');


// Route::get("/edit", function () {
//     return view("edit");
// });
Route::get('/news/edit/{id}', [NewsController::class, 'updateNews'])->name('editNews');
Route::post('/update/{id}', [NewsController::class, 'updateNewsStore'])->name('update');
Route::get('/dashboard/{id}', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/hapus/{id}', [NewsController::class, 'destroy'])->name('hapus');
Route::get('/category/{categoryName}', [NewsController::class, 'category'])->name('category');
// Route untuk search (sudah ada)
Route::get('/search', [NewsController::class, 'search'])->name('search');

// Route untuk view detail berita (perlu ditambahkan)
Route::get('/news/{id}', [NewsController::class, 'show'])->name('view');
// atau
Route::get('/view/{id}', [NewsController::class, 'view'])->name('view');

// Route::get("/search", function () {
//     return view("search");
// });
