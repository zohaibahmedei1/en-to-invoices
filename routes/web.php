<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;


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

Route::get('/', function () {
    return view('result');
});

Route::get('file', [FileController::class, 'fileView']);
Route::post('file-upload', [FileController::class, 'store'])->name('file.store');
Route::get('call-api', [FileController::class, 'api'])->name('file.api');

Route::get('xml-json', [FileController::class, 'XmlToJson'])->name('file.xml');


Route::get('test', [FileController::class, 'test'])->name('file.test');


