<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DropdownController;


route::get('/',[ProductController::class, 'show']);
route::post('/create',[ProductController::class, 'create'])->name('create.product');
route::post('/update', [ProductController::class, 'update'])->name('update.product');
route::post('/delete', [ProductController::class, 'delete'])->name('delete.product');
route::get('/pagination/paginate', [ProductController::class, 'pagination']);
route::get('/search', [ProductController::class, 'search'])->name('product.search');












Route::get('/dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState'])->name('fatch.state');
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity'])->name('fatch.city');
