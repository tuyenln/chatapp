<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\RedisEvent;

class RedisController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('message', compact('messages'));
    }

    public function postSendMessage(Request $request)
    {
        $messages = Message::create($request->all());

        event(
            $e = new RedisEvent($messages)
        );
        return redirect()->back();
    }
}
