<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    private $password;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'gender' => 'required',
            'age' => 'required|numeric|min:20|max:70',
            'country' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            //'phone_country' => 'required',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'description' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 3,
            'info' => [
                'gender' => $data['gender'],
                'age' => $data['age'],
                'country' => $data['country'],
                'phone' => [
                    //'country' => $data['phone_country'],
                    'number' => $data['phone']
                ],
                'description' => $data['description']
            ]
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        $this->password = $request->password;
        return $this->registered($request, $user);
    }

    protected function registered(Request $request, $user)
    {
        return response()->json([
            'message' => 'Created',
            'credentials' => [
                'username' => $user->email,
                'password' => $this->password
            ]
        ]);
    }
}
