<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EstadisticasAdminController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TiendaController;
use Illuminate\Support\Facades\Route;





Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');



Route::get('/categorias/buscar', [CategoryController::class, 'category'])->name('category.category');
Route::get('/informaciones', [InformationController::class, 'information'])->name('information.information');
Route::get('/perfil/usuario/{id}', [PerfilController::class, 'perfil'])->name('perfil.perfil');
Route::get('/category/{id}', [CategoryController::class, 'tipoCategory'])->name('category.tipoCategory');
Route::get('/product/{id}', [ProductController::class, 'verProducto'])->name('product.verProducto');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{productId}', [CommentController::class, 'getComments']);
Route::get('/user/follow-stats/{id}', [PerfilController::class, 'getFollowStats'])->name('user.follow-stats');



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    //like
    Route::post('/like/{product}', [LikeController::class, 'store'])->name('like.store');
    Route::get('/liked-products', [LikeController::class, 'getLikedProducts'])->name('liked-products');
    Route::delete('/api/likes/{productId}', [LikeController::class, 'removeLike']);
    
    //seguir
    Route::post('/follow', [FollowersController::class, 'follow'])->name('follow');

    //estadisticas
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //estadisticas admin
    Route::get('/estadisticas/admin', [App\Http\Controllers\EstadisticasAdminController::class, 'index'])->name('estadisticas.admin');

    //product
    Route::get('/productos', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('/crear-producto', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/productos/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('productos/data', [App\Http\Controllers\ProductController::class, 'getProduct'])->name('product.data');

   

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

    //banner
    Route::get('/banner', [App\Http\Controllers\BannerController::class, 'index'])->name('banner.index');
    Route::get('banner/data', [App\Http\Controllers\BannerController::class, 'getBanner'])->name('banner.data');
    Route::post('banner/store', [App\Http\Controllers\BannerController::class, 'store'])->name('banner.store');
    Route::get('banner/create', [App\Http\Controllers\BannerController::class, 'create'])->name('banner.create');
    Route::post('banner/{id}/update-status', [App\Http\Controllers\BannerController::class, 'updateStatus'])->name('banner.updateStatus');
    Route::post('banner/{id}', [App\Http\Controllers\BannerController::class, 'destroy'])->name('banner.destroy');

});
