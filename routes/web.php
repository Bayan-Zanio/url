<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/', [ShortLinkController::class,'index'])->middleware('auth')->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';


//Route::get('/', [HomeController::class,'index']);
Route::get('/', [ShortLinkController::class,'index'])->middleware('auth')->name('index');
//Route::get('generate-shorten-link', 'ShortLinkController@index');
Route::post('generate-shorten-link', [ShortLinkController::class,'store'])->name('generate.shorten.link.post');
//Route::post('generate-shorten-link', 'ShortLinkController@store')->name('generate.shorten.link.post');
Route::get('{code}', [ShortLinkController::class,'shortenLink'])->name('shorten.link');  
//Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');

