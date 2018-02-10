<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/27/18
 * Time: 5:03 PM
 */

namespace App\Http\Services\User;

use App\SubscriptionList;
use JWTAuth;
use App\User;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Response;
use App\Http\Resources\UserResource;
use App\Bar;

interface UserServiceInterface
{




    //User adds Bar to SubscriptionList.
    public function addBarToSubs(Bar $bar, User $user);

    //User removes Bar from SubscriptionList
    public function removeBarFromSubs(Bar $bar, User $user);

    //Owner can claim bar as his
    public function claimBar(Bar $bar, User $user);



    //Owner can see his bar list. Given a user, check if it has bars, if true return a collection of those bars.
    public function ownerBarList(User $user);

    //Owner can modify his Bar keywords.
    public function editKeywords(Bar $bar);


    //Owner can modify keywords of his bar.

    //



    //FUTURE IMPLEMENTATIONS


}