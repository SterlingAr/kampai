<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/27/18
 * Time: 5:04 PM
 */


namespace App\Http\Services\User;
use App\SubscriptionList;
use JWTAuth;
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

    public function loginOrFail(Request $request)
    {

        $credentials= $request->only('email', 'password');

        if ( ! $token = JWTAuth::attempt($credentials))
        {
            return Response::json(false, HttpResponse::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request->email)->get()->first();
        $roles = $user->roles()->orderBy('name')->get();
        $user_arr  = new UserResource($user);



        return response()->json([
            'success' => true,
            'data'=> [ 'token' => $token ],
            'user' => $user_arr,
            'roles' => $roles,
        ]);

    }
    public function registerOrFail(Request $request)
    {

//        $credentials = $request->only('name','email', 'password');

        try {
            $user = new User();
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

        } catch (Exception $e) {
            return Response::json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
        }
        $token = JWTAuth::fromUser($user);

        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);

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



    public function addBarToSubs(Bar $bar, User $user)
    {
        //check if user has subscription list, if it doesn't exist, create it
        // and return 201 Created.
        $subList = $user
            ->subscription()
            ->get()
            ->first();
//        dd($subList);
        if(!isset($subList))
        {
            $subList = new SubscriptionList();
            $subList->save();
            $subList->bars()->save($bar);

            $user->subscription()->save($subList);

            return response()->json(
                [
                    'subscription_list' => json_encode($subList),
                    'status' => 'SubscriptionList created.'
                ],HttpResponse::HTTP_CREATED);
        }

        $barsInList = $subList->bars()->get();

        if(!$barsInList->containsStrict('id',$bar->id) )
        {
            $subList->bars()->save($bar);
            return response()->json([
                'subscription_list' => $subList,
                'status' => 'Bar added to SubscriptionList'
            ],HttpResponse::HTTP_OK);
        }
        else
        {
            return response()->json([
                'status' => 'Bar already exists in that list'
            ],HttpResponse::HTTP_NO_CONTENT);
        }


        //check if bar exists in that list.
        // if exists, return SubscriptionList and 200 OK
        // if not return 202 Accepted.


//        return response().json([],HttpResponse::HTTP_ACCEPTED);

        //check

    }

    public function removeBarFromSubs($Bar, User $user)
    {
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