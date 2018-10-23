<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\Http\Controllers\Controller;
use Hash;
use Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('pages.register');
    }

    /**
     * @project VirtualClinic
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * @project VirtualClinic
     *
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 1,
            'info' => []
        ]);
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @return string
     */
    public function redirectTo()
    {
        if (\Auth::user()->isAdmin())
            return route('admin.home');

        if (\Auth::user()->isDoctor())
            return route('doctor.home');

        if (\Auth::user()->isMember())
            return route('member.home');
    }
}
