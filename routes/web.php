<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\authorController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\publishController;
use App\Http\Controllers\expenseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/category',[categoryController::class,'index'])->name('categories');
Route::get('/showCategory',[categoryController::class,'getCategories']);
Route::post('/saveCategory',[categoryController::class,'save']);
Route::post('/updateCategory',[categoryController::class,'update']);
Route::post('/deleteCategory',[categoryController::class,'delete']);

Route::get('/author',[authorController::class,'index'])->name('authors');
Route::get('/showAuthor',[authorController::class,'getAuthors']);
Route::post('/saveAuthor',[authorController::class,'save']);
Route::post('/updateAuthor',[authorController::class,'update']);
Route::post('/deleteAuthor',[authorController::class,'delete']);

Route::get('/',[bookController::class,'index']);
Route::get('/book',[bookController::class,'index'])->name('books');
Route::get('/showBook',[bookController::class,'getBooks']);
Route::post('/saveBook',[bookController::class,'save']);
Route::post('/updateBook',[bookController::class,'update']);
Route::post('/deleteBook',[bookController::class,'delete']);

Route::get('/seller',[sellerController::class,'index'])->name('sellers');
Route::get('/showSeller',[sellerController::class,'getSellers']);
Route::post('/saveSeller',[sellerController::class,'save']);
Route::post('/updateSeller',[sellerController::class,'update']);
Route::post('/deleteSeller',[sellerController::class,'delete']);

Route::get('/publish',[publishController::class,'index'])->name('publishes');
Route::get('/showPublish',[publishController::class,'getPublishers']);
Route::post('/savePublish',[publishController::class,'save']);
Route::post('/updatePublish',[publishController::class,'update']);
Route::post('/deletePublish',[publishController::class,'delete']);

Route::get('/expense',[expenseController::class,'index'])->name('expenses');
Route::get('/showExpense',[expenseController::class,'getExpenses']);
Route::post('/saveExpense',[expenseController::class,'save']);
Route::post('/updateExpense',[expenseController::class,'update']);
Route::post('/deleteExpense',[expenseController::class,'delete']);


