<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\EstadisticasAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FooterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias/buscar', [CategoryController::class, 'category'])->name('category.category');
Route::get('/informaciones', [InformationController::class, 'information'])->name('information.information');
Route::get('/perfil/usuario', [PerfilController::class, 'perfil'])->name('perfil.perfil');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    //estadisticas
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //estadisticas admin
    Route::get('/estadisticas/admin', [App\Http\Controllers\EstadisticasAdminController::class, 'index'])->name('estadisticas.admin');

    //product
    Route::get('/productos', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

    //buy
    Route::get('/compras', [App\Http\Controllers\BuyController::class, 'index'])->name('buy.index');
});

Route::group(['middleware' => ['auth', 'role:1']], function () {

    //category
    Route::get('/categorias', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get('categories/data', [App\Http\Controllers\CategoryController::class, 'getCategories'])->name('categories.data');
    Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::put('categories/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::post('categories/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('categories/{id}/update-status', [App\Http\Controllers\CategoryController::class, 'updateStatus'])->name('categories.updateStatus');

    //information
    Route::get('/informacion', [App\Http\Controllers\InformationController::class, 'index'])->name('information.index');
    Route::post('/informacion/agregar', [App\Http\Controllers\InformationController::class, 'store'])->name('information.store');
    Route::get('/information', [App\Http\Controllers\InformationController::class, 'show'])->name('information.show');

    //footer
    Route::get('/footer', [App\Http\Controllers\FooterController::class, 'index'])->name('footer.index');
    Route::post('/footer/save-contact', [App\Http\Controllers\FooterController::class, 'saveContact'])->name('footer.saveContact');
    Route::post('/footer/save-rrss', [App\Http\Controllers\FooterController::class, 'saveRRSS'])->name('footer.saveRRSS');
    Route::post('/footer/save-description', [App\Http\Controllers\FooterController::class, 'saveDescription'])->name('footer.saveDescription');
});
