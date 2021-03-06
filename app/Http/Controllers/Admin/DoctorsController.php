<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required|string|max:150',
            'lname' => 'required|string|max:150',
            'gender' => 'required',
            'age' => 'required|numeric|min:20|max:70',
            'country' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_country' => 'required',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'description' => 'required',
            'specialities' => 'required'
        ]);

        $doctor = User::create([
            'name' => $request->input('fname') . ' ' . $request->input('lname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 2,
            'info' => [
                'gender' => $request->input('gender'),
                'age' => $request->input('age'),
                'country' => $request->input('country'),
                'phone' => [
                    'country' => $request->input('phone_country'),
                    'number' => $request->input('phone')
                ],
                'description' => $request->input('description')
            ]
        ]);

        if ($request->hasFile('profile_pic')) {
            $name = $doctor->getKey() .
                '.' . $request->file('profile_pic')->getClientOriginalExtension();
            $request->file('profile_pic')->storeAs('profiles', $name);

            $doctor->updateValue('profile_pic', 'storage/profiles/' . $name);
        }

        $doctor->specialities()->sync($request->input('specialities'));

        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.doctors.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'fname' => 'required|string|max:150',
            'lname' => 'required|string|max:150',
            'gender' => 'required',
            'age' => 'required|numeric|min:20|max:70',
            'country' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_country' => 'required',
            'phone' => 'required',
            'password' => 'confirmed',
            'description' => 'required',
            'specialities' => 'required'
        ]);

        $user->update([
            'name' => $request->input('fname') . ' ' . $request->input('lname'),
            'email' => $request->input('email'),
        ]);

        if ($request->has('password')) {
            $user->update([
                'password' => Hash::make($request->input('password'))
            ]);
        }

        $user->updateValues([
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'country' => $request->input('country'),
            'phone' => [
                'country' => $request->input('phone_country'),
                'number' => $request->input('phone')
            ],
            'description' => $request->input('description')
        ]);

        if ($request->hasFile('profile_pic')) {
            @unlink($user->info->get('profile_pic'));

            $name = $user->getKey() .
                '.' . $request->file('profile_pic')->getClientOriginalExtension();
            $request->file('profile_pic')->storeAs('profiles', $name);

            $user->updateValue('profile_pic', 'storage/profiles/' . $name);
        }

        $user->specialities()->sync($request->input('specialities'));

        return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        @unlink($user->info->get('profile_pic'));
        $user->specialities()->sync([]);

        if ( $user->delete() ) {
            return redirect()->route('admin.doctors.index');
        }
    }

    /**
     * @project VirtualClinic - Nov/2018
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ban(Request $request, User $user)
    {
        $user->ban([
            'comment' => $request->input('comment'),
            'expired_at' => $request->input('expired_at')
        ]);

        return redirect()->route('admin.doctors.index');
    }

    /**
     * @project VirtualClinic - Nov/2018
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unban(User $user)
    {
        $user->unban();

        return redirect()->route('admin.doctors.index');
    }
}
