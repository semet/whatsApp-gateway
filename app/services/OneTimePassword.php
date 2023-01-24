<?php

namespace App\services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OneTimePassword
{
    public function send(string $to, string $message)
    {
        try {
            $response = Http::post('https://api.ultramsg.com/instance30002/messages/chat', [
                'token' => '1560gru3lclh2ggh',
                'to' => $to,
                'body' => $message,
                'priority' => '1',
                'referenceId' => ''
            ]);

            $res =  json_decode($response, true);

            return $res;
        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
