<?php

use App\Http\Controllers\AricleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('welcome');
})->name('login');
Route::get('/', [ArticleController::class, 'viewHome'])->name('viewHome');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/art', [ArticleController::class, 'article'])->name('article')->middleware(['auth']);
Route::post('/add-article', [ArticleController::class, 'addarticle'])->name('article.add');
Route::get('/delete-article/{id}', [ArticleController::class, 'deletearticle'])->name('article.delete')->middleware(['auth']);
Route::post('/edit-article', [ArticleController::class, 'editarticle'])->name('article.edit')->middleware(['auth']);

Route::get('/category', [CategoryController::class, 'category'])->name('category')->middleware(['auth']);
Route::post('/add-category', [CategoryController::class, 'addcategory'])->name('category.add')->middleware(['auth']);
Route::get('/delete-category/{id}', [CategoryController::class, 'deletecategory'])->name('category.delete')->middleware(['auth']);
Route::post('/edit-category', [CategoryController::class, 'editcategory'])->name('category.edit')->middleware(['auth']);



Route::get('/tag', [TagController::class, 'tag'])->name('tag')->middleware(['auth']);
Route::post('/add-tag', [TagController::class, 'addtag'])->name('tag.add')->middleware(['auth']);
Route::post('/edit-tag', [TagController::class, 'edittag'])->name('tag.edit')->middleware(['auth']);
Route::get('/delete-tag/{id}', [TagController::class, 'deletetag'])->name('tag.delete')->middleware(['auth']);


require __DIR__.'/auth.php';
