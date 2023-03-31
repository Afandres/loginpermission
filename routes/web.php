<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Middleware\lang;

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
Route::middleware(['lang'])->group(function($lang){

    Route::post('/widgets/alertbox/read', 'AlertboxController@postMessage')->name('alertbox.post');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
 
Route::get('lang/{lang}',function($lang){
    session(['lang'=>$lang]);
    return Redirect::back();
})->where(['lang'=>'es|en']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/prueba', [App\Http\Controllers\HomeController::class, 'prueba'])->name('prueba');



Route::get('/inventario', [App\Http\Controllers\HomeController::class, 'inventario'])->name('inventario');



Route::get('/calculator', [App\Http\Controllers\CalculatorController::class, 'index'])->middleware('can:admin.caculator')->name('admin.calculator');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/resultado', [App\Http\Controllers\CalculatorController::class, 'resultado'])->name('resultado');

Route::get('/users',  [UserController::class, 'index'])->middleware('can:admin.users.index')->name('admin.users.index');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');

Route::get('/apprentices', [App\Http\Controllers\ApprenticeController::class, 'index'])->name('admin.apprentices.index');
Route::get('/apprentices/add', [App\Http\Controllers\ApprenticeController::class, 'getapprenticeadd'])->middleware('can:admin.apprentices.add')->name('admin.apprentice.add');
Route::post('/apprentices/add', [App\Http\Controllers\ApprenticeController::class, 'postapprenticeadd'])->name( 'admin.apprentice.add');
Route::get('/apprentices/edit/{id}', [App\Http\Controllers\ApprenticeController::class, 'getapprenticeedit'])->middleware('can:admin.apprentice.edit')->name('admin.apprentice.edit');
Route::post('/apprentices/edit/{id}', [App\Http\Controllers\ApprenticeController::class, 'postapprenticeedit'])->name('admin.apprentice.edit');
Route::get('/apprentices/delete/{id}', [App\Http\Controllers\ApprenticeController::class, 'getapprenticedelete'])->middleware('can:admin.apprentice.delete')->name('admin.apprentice.delete');


Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->middleware('can:admin.products')->name('admin.products');
Route::get('/products/add', [App\Http\Controllers\ProductController::class, 'getproductadd'])->name('product.add');
Route::post('/products/add', [App\Http\Controllers\ProductController::class, 'postproductadd'])->name('product.add');
Route::get('/products/edit/{id}', [App\Http\Controllers\ProductController::class, 'getproductedit'])->name('product.edit');
Route::post('/products/edit/{id}', [App\Http\Controllers\ProductController::class, 'postproductedit'])->name('product.edit');
Route::get('/products/delete/{id}', [App\Http\Controllers\ProductController::class, 'getproductdelete'])->name('product.delete');



});