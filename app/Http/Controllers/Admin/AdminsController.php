<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = User::create([
            'name' => $request->input('fname') . ' ' . $request->input('lname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 1,
            'info' => []
        ]);

        if ($request->hasFile('profile_pic')) {
            $name = str_pad($admin->getKey(), 4, '0', STR_PAD_LEFT) .
                '.' . $request->file('profile_pic')->getClientOriginalExtension();
            $request->file('profile_pic')->storeAs('profiles', $name);

            $admin->updateValue('profile_pic', 'storage/profiles/' . $name);
        }

        return redirect()->route('admin.admins.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.admins.edit', compact('user'));
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
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'confirmed',
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

        if ($request->hasFile('profile_pic')) {
            @unlink($user->info->get('profile_pic'));

            $name = str_pad($user->getKey(), 4, '0', STR_PAD_LEFT) .
                '.' . $request->file('profile_pic')->getClientOriginalExtension();
            $request->file('profile_pic')->storeAs('profiles', $name);

            $user->updateValue('profile_pic', 'storage/profiles/' . $name);
        }

        return redirect()->route('admin.admins.index');
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

        if ( $user->delete() ) {
            return redirect()->route('admin.admins.index');
        }
    }
}
