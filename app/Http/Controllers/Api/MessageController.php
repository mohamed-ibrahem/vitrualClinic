<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use App\Message;
use App\Notifications\NewMessage;
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
                'app' => env('PUSHER_APP_KEY', '790858f6c6dde789ec55'),
                'cluster' => env('PUSHER_APP_CLUSTER', 'eu'),
                'authEndpoint' => url('/api/broadcasting/auth'),
            ]
        ]);
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $user = User::find($request->get('user'));
        $conv = auth()->user()->conversationsWith($user);
        $data = [
            'type' => $request->get('inputType', 'message'),
            'images' => []
        ];

        if ($data['type'] === 'message') {
            $data['message'] = $request->get('message')[0]['message'];
        } else {
            $data['message'] = implode('<br>', array_map(function($message) {
                return $message['message1'] . ' <b><u>' . $message['message2'] . '</u></b>';
            }, $request->get('message')));
        }

        if ($request->get('img')) {
            foreach ($request->get('img') as $image) {
                $image = str_replace('data:image/jpeg;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $file = 'chat/' . $request->user()->getKey() . '_' . time() . rand(0000, 9999) . '.png';

                \Storage::put($file, base64_decode($image));
                $data['images'][] = $file;
            }
        }

        $message = $conv->send($data);

        broadcast(new MessageSent($conv, $message))->toOthers();
        if ($user->fcm_token)
            $user->notify(new NewMessage($message));

        return response()->json([
            MessageResource::make($message)
        ]);
    }

    public function makeSeen(Message $message)
    {
        $message->seen();
    }
}
