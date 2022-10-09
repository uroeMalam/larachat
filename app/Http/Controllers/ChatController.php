<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function rooms(Request $request)
    {
        return ChatRoom::all();
    }

    // get semua data sesuai dengan room nya
    public function messages(Request $request,$roomId)
    {
        return ChatMessage::where('chat_room_id',$roomId)
                            ->with('user')
                            ->orderBy('created_at','DESC')
                            ->get();
    }

    // untuk nambah pesan baru
    public function newMessage(Request $request, $roomId)
    {
        $new = new ChatMessage();
        $new->user_id = Auth::id();
        $new->chat_room_id = $roomId;
        $new->message = $request->message;
        $new->save();

        // broadcast(new NewChatMessage($new))->toOthers();

        return $new;
    }

}
