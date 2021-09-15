<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function rooms(Request $request) {
        $rooms = Room::all();

        return Inertia::render('Chat/rooms', [
            'rooms' => $rooms
        ]);
    }

    public function messages(Request $request, $roomId) {
        $room = Room::where('id', $roomId)->first();
        return Inertia::render('Chat/roomShow', [
            'room' => $room,
        ]);
    }

    public function getMessages(Request $request, $roomId) {
        $messages = Message::where('room_id', $roomId)
        ->with('user')
        ->orderBy('created_at', 'DESC')
        ->get();

        return $messages;
    }

    public function message(Request $request, $roomId) {
        $message = new Message;
        $message->user_id = auth()->user()->id;
        $message->room_id = $roomId;
        $message->message = $request->message;

        $message->save();
        return $message;
    }
}
