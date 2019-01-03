<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($id)
    {
        $messages = \Talk::getMessagesByUserId($id);

        return response()->json([
            'messages' => $messages ?: []
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            \Talk::sendMessageByUserId($request->get('user'), $request->get('message'))
        ]);
    }
}
