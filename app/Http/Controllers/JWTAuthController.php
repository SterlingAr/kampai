<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Response;
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


    /**
     * Invalidate the token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) {

        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }



}
