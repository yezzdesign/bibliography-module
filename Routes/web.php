<?php

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

Route::name('bibliography.')->group(function () {
    Route::group(['middleware' => ['auth'], 'prefix' => 'bibliography'], function () {

        Route::get('/',                 [\Modules\Bibliography\Http\Controllers\BibliographyController::class, 'index'])  ->name('backend.index');
        Route::get('/create',           [\Modules\Bibliography\Http\Controllers\BibliographyController::class, 'create']) ->name('backend.create');
        Route::post('/create',          [\Modules\Bibliography\Http\Controllers\BibliographyController::class, 'store'])  ->name('backend.store');
        Route::get('/edit/{book}',      [\Modules\Bibliography\Http\Controllers\BibliographyController::class, 'edit' ])  ->name('backend.edit');
        Route::put('/update/{book}',    [\Modules\Bibliography\Http\Controllers\BibliographyController::class, 'update']) ->name('backend.update');
        Route::delete('/delete/{book}', [\Modules\Bibliography\Http\Controllers\BibliographyController::class, 'destroy'])->name('backend.post.delete');
        Route::get('/update/status/{book}', [\Modules\Bibliography\Http\Controllers\BibliographyController::class, 'changeStatus']) ->name('backend.status.change');

    });
});
