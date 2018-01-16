<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;

class JWTAuthController extends Controller
{
    /**
     * Check user and return token on success.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials= $request->only('email', 'password');

        if ( ! $token = JWTAuth::attempt($credentials))
        {
            return Response::json(false, HttpResponse::HTTP_UNAUTHORIZED);
        }

        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);

    }

    /**
     * Register new user and return token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $credentials = $request->only('name','email', 'password');

        try {
            $user = User::create($credentials);
        } catch (Exception $e) {
            return Response::json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
        }
        $token = JWTAuth::fromUser($user);

        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);
    }


}
