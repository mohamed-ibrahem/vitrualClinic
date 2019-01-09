<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Role;
use App\Speciality;
use App\User;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAuth(Request $request)
    {
        return new UserResource($request->user());
    }

    public function search(Request $request)
    {
        $allUsers = User::all();

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

                    return $is;
                })),
                'categories' => Speciality::where('display_name', 'LIKE', "%{$request->get('input')}%")->get()
            ]
        ]);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }
}
