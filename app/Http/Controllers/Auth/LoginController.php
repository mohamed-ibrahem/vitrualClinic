<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('pages.login');
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|null
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        try {
            $this->validate($request, [
                $this->username() => 'required|string',
                'password' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('web.auth.login')
                ->withInput()
                ->withErrors($exception->errors());
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            $this->sendLockoutResponse($request);
            return null;
        }

        if ($this->attemptLogin($request)) {
            $this->sendLoginResponse($request);
            return null;
        }

        $this->incrementLoginAttempts($request);

        $this->sendFailedLoginResponse($request);
    }
}
