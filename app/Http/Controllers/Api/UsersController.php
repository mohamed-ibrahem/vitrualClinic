<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Speciality;
use App\User;
use App\Role;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use willvincent\Rateable\Rating;

class UsersController extends Controller
{
    public function getAuth(Request $request)
    {
        return new UserResource($request->user());
    }

    public function updateAuth(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric|min:20|max:70',
            'country' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->user()->getKey(),
            //'phone_country' => 'required',
            'phone' => 'required',
            'old_password' => 'required_with:password',
            'password' => 'required_with:old_password|confirmed',
            'description' => 'required'
        ]);

        $request->user()->update([
            'name' => $request->get('name'),
        ]);

        if ($request->input('old_password') !== null) {
            if (!Hash::check($request->input('old_password'), $request->user()->password))
                throw ValidationException::withMessages([
                    'old_password' => trans('auth.failed')
                ]);

            $request->user()->update([
                'password' => Hash::make($request->get('password'))
            ]);
        }

        $request->user()->updateValues([
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'country' => is_array($request->input('country')) ? $request->input('country')['key'] : $request->input('country'),
            'phone' => [
                'country' => '',
                'number' => $request->input('phone')
            ],
            'description' => $request->input('description')
        ]);

        if ($request->input('img')) {
            @unlink(public_path($request->user()->info->get('profile_pic')));

            $image = $request->input('img');  // your base64 encoded
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            \Storage::put('profiles/' . $request->user()->getKey() . '_profile_image.png', base64_decode($image));
            $request->user()->updateValue('profile_pic', 'storage/profiles/' . $request->user()->getKey() . '_profile_image.png');
        }

        return new UserResource($request->user());
    }

    public function search(Request $request)
    {
        $allUsers = Role::Doctors()->user;

        return response()->json([
            'input' => $request->get('input'),
            'data' => [
                'users' => UserResource::collection($allUsers->filter(function (User $user) use ($request) {
                    $is = false;

                    if (str_contains(strtolower($user->name), strtolower($request->get('input'))))
                        $is = true;

                    if (str_contains(strtolower($user->info->get('description', '')), strtolower($request->get('input'))))
                        $is = true;

                    if ($user->info->get('phone', ['number' => ''])['number'] == $request->get('input'))
                        $is = true;

                    if (strtolower($user->email) == strtolower($request->get('input')))
                        $is = true;

                    if ($user->specialities()->where('display_name', 'LIKE', "%{$request->get('input')}%")->count())
                        $is = true;

                    if (countries($request->get('input')) === $user->info->get('country', 'EG'))
                        $is = true;

                    return $is;
                })),
                'categories' => Speciality::with('users')
                    ->where('display_name', 'LIKE', "%{$request->get('input')}%")
                    ->get()
            ]
        ]);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function rate(User $user, Request $request)
    {
        $rating = new Rating;
        $rating->rating = $request->get('rate');
        $rating->user_id = auth()->id();

        $user->ratings()->save($rating);

        return response()->json([
            'rate' => $user->ratingPercent(5)
        ]);
    }
}
