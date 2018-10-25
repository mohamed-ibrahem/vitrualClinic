<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @param string $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm($role = 'member')
    {
        return view('pages.register_' . $role);
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @param Request $request
     * @param $role
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request, $role)
    {
        $this->validator($request->all(), $role)->validate();

        event(new Registered($user = $this->create($request->all(), $role)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * @project VirtualClinic
     *
     * @param array $data
     * @param $role
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    protected function validator(array $data, $role)
    {
        $rules = [
            'fname' => 'required|string|max:150',
            'lname' => 'required|string|max:150',
            'gender' => 'required',
            'age' => 'required|min:0|max:200',
            'country' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_country' => 'required',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ];

        if ($role === 'member')
            $rules = [
                'program' => 'required'
            ];
        else if ($role === 'doctor')
            $rules = [
                'description' => 'required',
                'specialities' => 'required'
            ];

        return Validator::make($data, $rules);
    }

    /**
     * @project VirtualClinic
     *
     * @param array $data
     * @param $role
     * @return mixed
     */
    protected function create(array $data, $role)
    {
        return User::create([
            'name' => $data['fname'] . ' ' . $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => ($role === 'member' ? 3 : ($role === 'doctor' ? 2 : 1)),
            'info' => [
                'gender' => $data['gender'],
                'age' => $data['age'],
                'country' => $data['country'],
                'phone' => [
                    'country' => $data['phone_country'],
                    'number' => $data['phone']
                ]
            ]
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
