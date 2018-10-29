<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
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
     * @user mohamed-ibrahim 2018
     *
     * @param Request $request
     * @return void
     *
     * @throws ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => ['required', 'string', new \App\Rules\hasRole],
            'password' => 'required|string',
        ]);
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @return string
     */
    public function redirectTo()
    {
        return route('admin.home');
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }
}
