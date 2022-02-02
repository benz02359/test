<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CalculatorController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/',[HomeController::class,'index'])->name('Home');
Route::get('/',[AlbumController::class,'index'])->name('album');

Route::get('/album',[AlbumController::class,'index'])->name('album');
Route::get('/album/create',[AlbumController::class,'create'])->name('createalbum');
Route::post('/album/add',[AlbumController::class,'store'])->name('addalbum');
Route::get('/album/show/{id}',[AlbumController::class,'show']);
Route::post('/album/show/{id}/uploadimg',[AlbumController::class,'uploadimg']);
Route::get('/album/edit/{id}',[AlbumController::class,'edit']);
Route::post('/album/update/{id}',[AlbumController::class,'update']);
Route::get('/album/delete/{id}',[AlbumController::class,'delete']);

Route::get('/imageindex',[ImageController::class,'index'])->name('imageindex');
Route::get('/image/create',[ImageController::class,'create'])->name('createimage');
Route::post('/image/add',[ImageController::class,'store'])->name('addimage');
Route::get('/image/delete/{id}',[ImageController::class,'delete']);

Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::post('/category/add',[CategoryController::class,'store'])->name('addcategory');
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('/category/update/{id}',[CategoryController::class,'update']);
Route::get('/category/delete/{id}',[CategoryController::class,'delete']);

Route::get('/tag',[TagController::class,'index'])->name('tag');
Route::post('/tag/add',[TagController::class,'store'])->name('addtag');
Route::get('/tag/edit/{id}',[TagController::class,'edit']);
Route::post('/tag/update/{id}',[TagController::class,'update']);
Route::get('/tag/delete/{id}',[TagController::class,'delete']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/calculator',[CalculatorController::class,'index'])->name('calculator');
Route::post('/calculator/cal',[CalculatorController::class,'cal'])->name('cal');

Route::get('/change',[ChangeController::class,'index'])->name('change');
Route::post('/change/cal',[ChangeController::class,'change'])->name('changecal');

