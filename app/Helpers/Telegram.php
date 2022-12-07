<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram
{
    protected $bot;
    const url = 'https://api.tlgr.org/bot';

    public function __construct($bot)
    {
        $this->bot = $bot;
    }

    public function sendMessage(int $chat_id, string $message)
    {
        return Http::post(self::url . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message . Carbon::now(),
            'parse_mode' => 'html',
        ]);
    }

    public function editMessage($chat_id, $message, $message_id)
    {
        return  Http::post(self::url . $this->bot . '/editMessageText', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'message_id' => $message_id
        ]);
    }

    public function sendDocument(int $chat_id, $file, $reply_id = 'null')
    {
        $doc = Http::attach('document', Storage::get('/public/' . $file), 'document.png')
            ->post(self::url . $this->bot . '/sendDocument', [
                'chat_id' => $chat_id,
                'reply_to_message_id' => $reply_id
            ]);
        return $doc;
    }
    public function sendButtons($chat_id, $message, $button)
    {
        $sendButton = Http::post(self::url . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button
        ]);
        return $sendButton;
    }
    public function editButtons($chat_id, $message, $button, $message_id)
    {
        return  Http::post(self::url . $this->bot . '/editMessageText', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,
            'message_id' => $message_id,
        ]);
    }
}