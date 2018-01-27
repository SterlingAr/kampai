<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Response;
use App\Http\Resources\UserResource;
use App\Http\Services\User\UserServiceInterface;

class JWTAuthController extends Controller
{

    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {

        $this->userService = $userService;
    }


    /**
     * Check user and return token on success.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

      return  $this->userService->loginOrFail($request);

    }

    /**
     * Register new user and return token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
       return $this->userService->registerOrFail($request);

    }


    /**
     * Invalidate the token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        return $this->userService->logout($request);
    }



}
