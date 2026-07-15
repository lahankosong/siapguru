<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of user's chats.
     */
    public function index()
    {
        $chats = Chat::where('user_one_id', Auth::id())
            ->orWhere('user_two_id', Auth::id())
            ->with(['userOne', 'userTwo', 'messages' => function ($query) {
                $query->latest()->limit(1);
            }])
            ->latest()
            ->get();

        return view('chat.index', compact('chats'));
    }

    /**
     * Show a specific chat conversation.
     */
    public function show(Chat $chat)
    {
        $this->authorizeChat($chat);
        
        $chat->load(['userOne', 'userTwo', 'messages.sender']);
        
        // Mark messages as read
        Message::where('chat_id', $chat->id)
            ->where('sender_id', '!=', Auth::id())
            ->update(['is_read' => true]);

        return view('chat.show', compact('chat'));
    }

    /**
     * Create or show chat with a tutor.
     */
    public function create(User $tutor)
    {
        if ($tutor->role !== 'tutor') {
            abort(404);
        }

        $chat = Chat::where(function ($query) use ($tutor) {
            $query->where('user_one_id', Auth::id())
                ->where('user_two_id', $tutor->id);
        })->orWhere(function ($query) use ($tutor) {
            $query->where('user_one_id', $tutor->id)
                ->where('user_two_id', Auth::id());
        })->first();

        if (!$chat) {
            $chat = Chat::create([
                'user_one_id' => Auth::id(),
                'user_two_id' => $tutor->id,
            ]);
        }

        return redirect()->route('chat.show', $chat);
    }

    /**
     * Store a new message.
     */
    public function store(Request $request, Chat $chat)
    {
        $this->authorizeChat($chat);

        $validated = $request->validate([
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:2048',
        ]);

        $message = Message::create([
            'chat_id' => $chat->id,
            'sender_id' => Auth::id(),
            'message' => $validated['message'],
            'attachment' => $validated['attachment'] ?? null,
        ]);

        return back()->with('success', 'Pesan terkirim.');
    }

    /**
     * Authorize that the user is part of this chat.
     */
    private function authorizeChat(Chat $chat): void
    {
        if (Auth::id() !== $chat->user_one_id && Auth::id() !== $chat->user_two_id) {
            abort(403);
        }
    }
}