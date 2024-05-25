<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(): JsonResponse
    {
        $user = User::all();

        return response()->json(['data' => $user]);
    }

    public function signup(CreateUserRequest $request): JsonResponse
    {
        $data = $request->only(['name', 'email', 'password', 'state_id']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        $response = [
            'error' => '',
            'token' => $user->createToken('Register_token')->plainTextToken
        ];

        return response()->json($response);
        
    }

    public function signin(SignInRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $response = [
                'error' => '',
                'token' => $user->createToken('Register_token')->plainTextToken
            ];

            return response()->json($response);
        }

        return response()->json(['error' => 'Usuário ou senha incorretos'], 401);
    }

    public function me(): JsonResponse
    {
        /**{name, email,
         * state: nome do estado
         * ads[array de anuncios]} */

         $user = Auth::user();
         $response = [
             'id' => $user->id,
             'name' => $user->name,
             'email' => $user->email,
             'state' => $user->state->name,
             'ads' => $user->Advertises
         ];

        return response()->json($response);
    }
}
