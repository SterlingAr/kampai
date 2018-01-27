<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/27/18
 * Time: 7:05 PM
 */

namespace App\Http\Controllers\Api\Users;
use Illuminate\Http\Request;
use App\Http\Services\User\UserServiceInterface;
use App\Bar;
use App\User;

class UserActionController
{

    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {

        $this->userService = $userService;
    }



    public function addBarToSubs(Request $request)
    {
        $bar = Bar::where('node', $request->node)->first();
        $user = User::where('user_id', $request->id)->first();

        $this->userService->addBarToSubs($bar,$user);

    }

}