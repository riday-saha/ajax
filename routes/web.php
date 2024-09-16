<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DropdownController;


route::get('/',[ProductController::class, 'show']);
route::post('/create',[ProductController::class, 'create'])->name('create.product');
//route::post('/update', [ProductController::class, 'update'])->name('update.product');
route::post('/update-product',[ProductController::class,'updates'])->name('update.products');
route::post('/delete', [ProductController::class, 'delete'])->name('delete.product');
route::get('/pagination/paginate', [ProductController::class, 'pagination']);
route::get('/search', [ProductController::class, 'search'])->name('product.search');


//delete multiple user using checkbox
route::get('/all_users',[ProductController::class, 'data']);
Route::delete('delete-all', [ProductController::class, 'dlt_users'])->name('delete.multi');


//dependant dropdown
Route::get('/dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState'])->name('fatch.state');
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity'])->name('fatch.city');

//insert checkbox data
route::get('/insert',[ProductController::class, 'checkbox']);
route::post('/insert-data',[ProductController::class, 'insert_box'])->name('insert.data');
route::get('/show-all',[ProductController::class, 'show_all']);
route::get('/update-data/{id}',[ProductController::class, 'update_box'])->name('update.box');
route::post('/update',[ProductController::class, 'update_checkbox'])->name('update');

//Load Recording Using SelectBox
route::get('/select',[DropdownController::class,'select']);
route::get('/select-data',[DropdownController::class,'city'])->name('select.city');

//range slider
route::get('/home',[DropdownController::class,'home']);
route::post('/age-range',[DropdownController::class,'age_range'])->name('age.range');



//range Date slide
route::get('/date',[DropdownController::class,'range_date'])->name('range.date');
route::post('/date-range',[DropdownController::class,'get_date'])->name('date.get');
