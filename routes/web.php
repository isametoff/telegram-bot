<?php

use App\Models\Order;
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

// Route::get('/', function (Order $order) {
//     return view('site.order', ['orders' => $order->active()->get()]);
// });
Route::get('/', function (\App\Models\Order $order) {
    return view('site.order', ['orders' => $order->active()->get()]);
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
});