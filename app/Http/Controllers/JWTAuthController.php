<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Response;
use App\Http\Resources\UserResource;
use App\Http\Services\Auth\JWTAuthServiceInterface;

class JWTAuthController extends Controller
{

    protected $authService;

    public function __construct(JWTAuthServiceInterface $authService)
    {

        $this->authService = $authService;
    }


    /**
     * Check user and return token on success.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

      return  $this->authService->loginOrFail($request);

    }

    /**
     * Register new user and return token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
       return $this->authService->registerOrFail($request);

    }


    /**
     * Invalidate the token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        return $this->authService->logout($request);
    }



}
