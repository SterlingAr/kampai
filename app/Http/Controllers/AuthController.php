<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use Validator;
//use Hash;
//use App\User;
//use JWTAuth;
//use Tymon\JWTAuth\Exceptions\JWTException;
//
////class AuthController extends Controller
////{
////
////    /**
////     * API Register
////     *
////     * @param Request $request
////     * @return \Illuminate\Http\JsonResponse
////     */
////    public function register(Request $request)
////    {
////        $rules = [
////            'email' => 'unique:users',
////        ];
////
////        $input = $request->only('name', 'email');
////
////        $validator = Validator::make($input, $rules);
////
////        if($validator->fails())
////        {
////            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
////        }
////
////        $name = $request->name;
////        $email = $request->email;
////        $password = $request->password;
////        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
////
////        return $this->login($request);
////    }
////
////    /**
////     * API Login, on success return JWT Auth token
////     *
////     * @param Request $request
////     * @return \Illuminate\Http\JsonResponse
////     */
////    public function login(Request $request)
////    {
////        $credentials = [
////            'email' => $request->email,
////            'password' => $request->password,
////        ];
////
////        try {
////            // attempt to verify the credentials and create a token for the user
////            if (! $token = JWTAuth::attempt($credentials)) {
////                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials.'], 401);
////            }
////
////        } catch (JWTException $e) {
////            // something went wrong whilst attempting to encode the token
////            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
////        }
////
////        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);
////    }
////
////
////}
//
//class AuthController extends Controller
//{
//
//}