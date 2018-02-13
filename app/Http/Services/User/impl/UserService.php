<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/27/18
 * Time: 5:04 PM
 */


namespace App\Http\Services\User;
use App\Http\Services\Osm\OsmServiceInterface;

use App\SubscriptionList;
use App\User;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Mockery\Exception;
use Response;
use App\Http\Resources\UserResource;
use App\Bar;
use App\Role;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Collection ;

class UserService implements UserServiceInterface
{
    use ValidatesRequests;

    protected $osmService;

     public function __construct(OsmServiceInterface $osmService)
     {
         $this->osmService = $osmService;
     }


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

            //return only node data.
            $barsInList = $subList->bars()->get();

            $node_data = $this->query_node_data($barsInList);

            return response()->json(
                [
                    'subscription_list' => json_decode($node_data),
                    'status' => 'SubscriptionList created.'
                ],HttpResponse::HTTP_CREATED);
        }

        //check if bar exists in that list.
        // if exists, return SubscriptionList and 409 Conflict
        // if not return 200 OK.
        $barsInList = $subList->bars()->get();

        if(!$barsInList->contains('id',$bar->id))
        {
            $subList->bars()->save($bar);

            $barsInList = $subList->bars()->get();

            $node_data = $this->query_node_data($barsInList);
            return response()->json(
                [
                'subscription_list' => json_decode($node_data),
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

        $node_data = $this->query_node_data($barsInList);

        return response()->json([
            'subscription_list' => json_decode($node_data), //return updated collection.
            'status' => 'Bar removed from SubscriptionList successfully'
        ],HttpResponse::HTTP_OK);
    }

    //Given an collection, return data as an array of objects.
    private function query_node_data($barsCollection)
    {
        $node_array = [];

        foreach($barsCollection as $bar)
        {
            array_push($node_array, $bar->node);
        }

        return $this->osmService->query_only_nodes($node_array);

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

    /**
     * @param Role $role
     * @param User $user
     * @return bool
     */
    private function hasRole(Role $role, User $user)
    {
        $roles = $user->roles()->get();

        if($roles->contains($role))
        {
            return true;
        }

        return false;

    }

    public function claimBar(Bar $bar, User $user)
    {
         //if bar exists and doesn't belong to other user.
         //if user doesn't have this bar already.
        //Add bar to user's list.
        //return array of owned bars.
        if($bar->user_id && $bar->user_id !== $user->user_id)
        {
            //bar doesn't belong to this user
            return response()->json([
                'status' => 'This bar is already owned by another user'
            ],HttpResponse::HTTP_UNAUTHORIZED);
        }

        if($bar->user_id && $bar->user_id == $user->id)
        {
            return response()->json([
                'status' => 'The bar is already owned by given user'
            ], HttpResponse::HTTP_CONFLICT);
            //bar already owned.
        }

        $role = Role::where('name','owner')->get()->first();

        if(!$this->hasRole($role, $user))
        {
            $user->roles()->save($role);
        }

        $user->bars()->save($bar);
        $bars_owned = json_decode($this->ownedBars($user));

        return response()->json([
            'status' => 'Bar claimed',
            'bars_owned' => $bars_owned->elements
        ], HttpResponse::HTTP_OK);

    }


    public function ownerBarList(User $user)
    {
        //retrieve bars owned by users and return an array.
      return $this->ownedBars($user);

    }

    private function ownedBars(User $user)
    {
        return $this->query_node_data($user->bars()->get());
    }

    public function editKeywords(Bar $bar)
    {

    }


}

?>