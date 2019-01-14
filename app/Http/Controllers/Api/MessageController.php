<?php

namespace App\Http\Controllers\Api;

use App\Conversation;
use App\Events\MessageSeen;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            ConversationResource::collection($request->user()->conversations())
        ]);
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return response()->json([
            'user' => UserResource::make($user),
            'messages' => ConversationResource::make(auth()->user()->conversationsWith($user)),
            'options' => [
                'app' => env('PUSHER_APP_KEY'),
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'authEndpoint' => url('/api/broadcasting/auth'),
            ]
        ]);
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $conv = auth()->user()->conversationsWith($request->get('user'));
        $message = $conv->send([
            'message' => $request->get('message')
        ]);

        broadcast(new MessageSent($conv, $message))->toOthers();

        return response()->json([
            MessageResource::make($message)
        ]);
    }

    public function makeSeen(Message $message)
    {
        $message->seen();
    }
}
