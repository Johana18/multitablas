<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImplementoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;

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
//Route::get('/', [ImplementoController::class,'index']);
Route::resource('implementos', ImplementoController::class);
Route::resource('productos', ProductoController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('cotizaciones', CotizacionController::class)->parameters([
    'cotizaciones' => 'cotizacion'
]);
/**Route::get('/', function () {
    return view('implementos.index');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
