<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/27/18
 * Time: 10:02 PM
 */

namespace App\Http\Services\Auth;

use Illuminate\Foundation\Validation\ValidatesRequests;
use JWTAuth;
use App\User;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Response;

class JWTAuthService implements JWTAuthServiceInterface
{


    use ValidatesRequests;

    public function loginOrFail(Request $request)
    {

        $credentials= $request->only('email', 'password');

        if ( ! $token = JWTAuth::attempt($credentials))
        {
            return Response::json(false, HttpResponse::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request->email)->get()->first();

        $roles = $user->roles()->orderBy('name')->get();

        $subscriptionList = $user->subscription
            ->get()
            ->first()
            ->bars()
            ->get();


        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,
            'subscriptionList' => $subscriptionList,
            'roles' => $roles,
        ]);

    }
    public function registerOrFail(Request $request)
    {

//        $credentials = $request->only('name','email', 'password');

        try {
            $user = new User();
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

        } catch (Exception $e) {
            return Response::json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
        }
        $token = JWTAuth::fromUser($user);

        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);

    }

    public function logout(Request $request)
    {

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