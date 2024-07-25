<?php
  use Modules\Admin\Http\Controllers\ProductController;
  use Modules\Admin\Http\Controllers\DashboardController;


  Route::get('dashboard', [DashboardController::class, 'dashBoard'])->name('dashboard');

  Route::prefix('product')->group(function() {                                                                      
    Route::get('/', [ProductController::class, 'productPage'])->name('product-page');
    Route::get('product-list', [ProductController::class, 'productList']);
    Route::post('import-csv', [ProductController::class, 'importCSV'])->name('import');
    Route::get('/create', [ProductController::class, 'productView']);
    Route::post('/create', [ProductController::class, 'productStore'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'productEdit']);
    Route::post('/edit/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
    Route::get('/delete/{id}', [ProductController::class, 'productDelete']);
    Route::post('/status', [ProductController::class, 'statusUpdate']);
});