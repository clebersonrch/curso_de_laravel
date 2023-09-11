<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;

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

/*Route::get('/', function () {
    return view('welcome');
    return redirect()->route('admin.clientes');
});*/

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');

/*Route::get('/produto/{id?}', [ProdutoController::class, 'show'])->name('produto.show');*/

Route::resource('produtos', ProdutoController::class);

Route::get('/empresa', function(){
    return view('site/empresa');
});

Route::any('/any', function(){
    return "Permite todo tipo de acesso em PHP (put, delete, get, post)";
});

Route::match(['put', 'delete'], '/match', function(){
    return "Permite apenas acessos definidos";
});

Route::get('/produto/{id}/{cat?}', function($id, $cat = ''){
    return "O id do produto é: ".$id."<br>"."A categoria é: ".$cat;   
});

Route::get('/news', function(){
    return view('news');
})->name('noticias');

Route::get('/novidades', function(){
    return redirect()->route('noticias');
});

/*Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function(){
    Route::get('dashboard', function(){
        return "dashboard";
    })->name('dashboard');

    Route::get('users', function(){
        return "users";
    })->name('users');

    Route::get('clientes', function(){
        return "clientes";
    })->name('clientes');
});*/