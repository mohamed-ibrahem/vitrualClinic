<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @param Request $request
     * @param $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json([
            'email' => trans($response)
        ], 403);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'status' => trans($response)
        ]);
    }
}
