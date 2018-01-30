<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/27/18
 * Time: 10:02 PM
 */

namespace App\Http\Services\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use JWTAuth;
use App\User;
use App\Role;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Collection;
class JWTAuthService implements JWTAuthServiceInterface
{



    use ValidatesRequests;

    public function loginOrFail(Request $request)
    {

        $credentials= $request->only('email', 'password');

        //JSON Web Token Authentication service, return token if successfull.
        if ( ! $token = JWTAuth::attempt($credentials))
        {
            return Response::json(false, HttpResponse::HTTP_UNAUTHORIZED);
        }


        $user =  $this->fetchUserData($request->email);
//        dd($user);


        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,

        ],HttpResponse::HTTP_OK);
    }



    public function registerOrFail(Request $request)
    {

            $validatedData = $request->validate([
                'name' => 'required|max:25',
                'email' => 'required',
                'password' => 'required|min:8|max:30|'
            ]);

            $user = User::where('email', $request->email);

            if (!isset($user))
            {
                $validatedData['password'] = bcrypt($request->password);
                $user = User::create($validatedData);
                $role = new Role();
                $role->name = 'normie';

                $user->roles()->save($role);
                $user->save();

                $token = JWTAuth::fromUser($user);

                return response()->json([
                    'success' => true,
                    'data' => ['token' => $token]], HttpResponse::HTTP_CREATED);

            }
            else
            {
                return response()->json([
                    'error' => 'User already exists.'],
                    HttpResponse::HTTP_CONFLICT);
            }


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


    /**
     * @param $email
     * @return mixed
     */
    private function fetchUserData($email)
    {
        try
        {
            $user = User::where('email', $email)->get()->first();

        }
        catch (ModelNotFoundException $e)
        {
            return $e;
        }

//        if(!$user)
//            return false;

        $roles = $user->roles()->get();
        if(isset($roles))
            $user->roles =  $roles;


        $subscription = $user->subscription()->get()->first();

        if(isset($subscription))
            $user->subscription = $subscription->bars()->get();

        return $user;

    }



}