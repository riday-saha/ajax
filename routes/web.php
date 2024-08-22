<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


route::get('/',[ProductController::class, 'show']);
route::get('/add-product',[ProductController::class, 'form']);
route::post('/add-products',[ProductController::class, 'create'])->name('form.create');
route::post('/update-product',[ProductController::class,'update_product'])->name('update.product');
route::post('/delete-product',[ProductController::class,'delete_product'])->name('delete.product');
route::get('/pagination/paginate-data',[ProductController::class,'pagination']);
route::get('/search-product',[ProductController::class,'search_product'])->name('search.product');
