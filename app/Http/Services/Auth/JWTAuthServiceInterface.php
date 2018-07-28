<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/27/18
 * Time: 10:02 PM
 */

namespace App\Http\Services\Auth;

use JWTAuth;
use App\User;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Response;

interface JWTAuthServiceInterface
{


    /**
     * login, returns user data, JWT token and roles
     *
     * @param Request $request
     * @return mixed
     */
    public function loginOrFail(Request $request);

    /**
     * register user, return JWT token, user data and roles
     *
     * @param Request $request
     * @return mixed
     */
    public function registerOrFail(Request $request);

    /**
     * Invalidate JWT token.
     *
     * @param Request $request
     * @return mixed
     */
    public function logout(Request $request);

}