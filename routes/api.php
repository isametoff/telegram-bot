<?php

use App\Helpers\Telegram;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function (Telegram $telegram) {
    $telegram->sendMessage(260367888, 'Hello');
});
Route::get('/sendDoc', function (Telegram $telegram) {
    $sendMessage = $telegram->sendDocument(260367888, '1.png');
    $sendMessage = json_decode($sendMessage);
    $http = $telegram->sendDocument(260367888, '1.png', $sendMessage->result->message_id);
});
Route::get('/sendButton', function (Telegram $telegram) {
    $buttons = [
        'inline_keyboard' =>
        [
            [
                [
                    'text' => '✅Принять',
                    'callback_data' => '1'
                ],
                [
                    'text' => 'Отклонить',
                    'callback_data' => '0',
                ],
            ]
        ]
    ];
    $sendMessage = $telegram->sendButtons(260367888, 'button', json_encode($buttons));
    $sendMessage = json_decode($sendMessage);
    dd($sendMessage);
    // $http = $telegram->sendDocument(260367888, '1.png', $sendMessage->result->message_id);
    // dd($http->body());
});
Route::get('/editButton', function (Telegram $telegram) {
    $buttons = [
        'inline_keyboard' =>
        [
            [
                [
                    'text' => '✅Принять!',
                    'callback_data' => '1'
                ],
                [
                    'text' => 'Отклонить!',
                    'callback_data' => '0',
                ],
            ]
        ]
    ];
    $sendMessage = $telegram->editButtons(260367888, 'button', json_encode($buttons), 107);
    $sendMessage = json_decode($sendMessage);
});