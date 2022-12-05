<?php

use App\Helpers\Telegram;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    Http::post('https://api.tlgr.org/bot5803519437:AAEudbg--uKFzyY0V_MMr4aILrJHqNivaMU/sendMessage', [
        'chat_id' => 260367888,
        'text' => '<b>Hello</b>',
        'parse_mode' => 'html',
    ]);
});
Route::get('/sendDoc', function (Telegram $telegram) {
    $sendMessage = $telegram->sendDocument(260367888, 'test');
    $sendMessage = json_decode($sendMessage);
    $http = $telegram->sendDocument(260367888, '1.png', $sendMessage->result->message_id);
    dd($http->body());
});