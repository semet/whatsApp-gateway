<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function showForm()
    {
        return view('message');
    }

    public function send(Request $request)
    {
        try {
            $response = Http::post('https://api.ultramsg.com/instance30002/messages/chat', [
                'token' => '1560gru3lclh2ggh',
                'to' => $request->phone,
                'body' => $request->message,
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
