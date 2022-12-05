<?php

namespace App\Helpers;

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

    public function sendMessage($chat_id, $message)
    {
        return Http::post(self::url . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
        ]);
    }

    public function sendDocument($chat_id, $file, $reply_id = null)
    {
        return Http::attach('document', Storage::get('/public/' . $file), 'document.png')
            ->post(self::url . $this->bot . '/sendDocument', [
                'chat_id' => $chat_id,
                'reply_to_message_id' => $reply_id
            ]);
    }
}
