<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController
{
    public function login(ApiLoginRequest $request): array
    {
        $user = User::whereEmail($request['email'])->firstOrFail();

        if (Hash::check($request['password'], $user->password)) {
            $abilities = $user
                ->roles
                ->pluck('name')
                ->toArray();

            return [
                'name' => $user->name,
                'email' => $user->email,
                'abilities' => $abilities,
                'token' => $user->createToken('api', $abilities)->plainTextToken,
            ];
        }

        abort(403, 'Invalid combination of email and password.');
    }

    public function register(ApiRegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = new User();
        $user->email = $validatedData['email'];
        $user->name = $validatedData['name'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return $user->id;
    }
}