<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Events\ChatEvent;

class ChatController extends Controller
{
    //
    public function index()
    {
        $chats = Chat::all();
        return view('chat', compact('chats'));
    }

    public function store(Request $request){
        $data = $request->all();

        $chats = Chat::create($data);
        event(
            $e = new ChatEvent($chats)
        );

        return redirect()->back();
    }
}
