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


    /**
     *
     * @param Request $request
     * @return mixed
     */
    public function addBarToSubs(Request $request)
    {
        $bar = Bar::where('node', $request->node)->first();
        $user = User::where('id', $request->user_id)->first();

        return $this->userService->addBarToSubs($bar,$user);

    }


    public function removeBarFromSubs($node_id, $user_id)
    {

        $bar = Bar::where('node', $node_id)->first();
        $user = User::where('id', $user_id)->first();

        return $this->userService->removeBarFromSubs($bar,$user);

    }

}