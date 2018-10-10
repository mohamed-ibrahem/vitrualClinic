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
     * @project VirtualClinic
     *
     * @return string
     */
    public function redirectTo()
    {
        return route('admin.home');
    }
}
