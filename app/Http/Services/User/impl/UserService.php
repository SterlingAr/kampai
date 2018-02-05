<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/27/18
 * Time: 5:04 PM
 */


namespace App\Http\Services\User;

use App\SubscriptionList;
use App\User;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Mockery\Exception;
use Response;
use App\Http\Resources\UserResource;
use App\Bar;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Collection ;

class UserService implements UserServiceInterface
{
    use ValidatesRequests;


    public function addBarToSubs(Bar $bar, User $user)
    {
        //check if user has subscription list, if it doesn't exist, create it
        // and return 201 Created.
        $subList = $user
            ->subscription()
            ->get()
            ->first();


        if(!isset($subList))
        {
            $subList = new SubscriptionList();
            $subList->save();
            $subList->bars()->save($bar);
            $user->subscription()->save($subList);
            $barsInList = $subList->bars()->get();

            return response()->json(
                [
                    'subscription_list' => $barsInList->toArray(),
                    'status' => 'SubscriptionList created.'
                ],HttpResponse::HTTP_CREATED);
        }

        $barsInList = $subList->bars()->get();

        //check if bar exists in that list.
        // if exists, return SubscriptionList and 409 Conflict
        // if not return 200 OK.
        if(!$barsInList->contains('id',$bar->id))
        {
            $subList->bars()->save($bar);

            $barsInList = $subList->bars()->get();

            return response()->json(
                [
                'subscription_list' => $barsInList->toArray(),
                'status' => 'Bar added to SubscriptionList'
            ],HttpResponse::HTTP_OK);
        }

        return response()->json([
            'status' => 'Bar already exists in that list'
        ],HttpResponse::HTTP_CONFLICT);


    }

    public function removeBarFromSubs(Bar $bar, User $user)
    {

        $subList = $user
            ->subscription()
            ->get()
            ->first();

        $barsInList = $subList->bars()->get();

        //if SubscriptionList doesn't contain Bar, return 410 Gone.
        if(!$barsInList->contains('id',$bar->id) )
        {
            return response()->json([
                'status' => 'SubscriptionList does not contain that Bar. '
            ],HttpResponse::HTTP_GONE);
        }

        //Remove Bar from SubscriptionList and return updated SubscriptionList with 200 OK code
        $subList->bars()->detach($bar->id);

        $barsInList = $this->forgetById($barsInList,$bar->id);

        return response()->json([
            'subList' => $barsInList->toArray(), //return updated collection.
            'status' => 'Bar removed from SubscriptionList successfully'
        ],HttpResponse::HTTP_OK);

    }

    //Custom hack for removing item from a collection, since Collection has no
    //method for removing a Model from collection. The key is
    private function forgetById($collection,$id)
    {
        foreach($collection as $key => $item)
        {
            if($item->id == $id)
            {
                $collection->forget($key);
                break;
            }
        }
        return $collection;
    }

    public function claimBar(Bar $bar)
    {
    }

    public function ownerBarList(User $user)
    {
    }

    public function editKeywords(Bar $bar)
    {

    }


}

?>