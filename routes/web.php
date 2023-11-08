<?php

use App\Http\Controllers\Api\Tasks;
use Illuminate\Support\Facades\Route;

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
Route::get('/tasks', [Tasks::class, 'index']);
Route::post('/tasks', [Tasks::class, 'store']);
Route::get('/', function () {
    return view('welcome');
});
