<?php
/**
 * Created by PhpStorm.
 * User: rincewind
 * Date: 1/27/18
 * Time: 10:02 PM
 */

namespace App\Http\Services\Auth;
use App\Http\Services\Osm\OsmServiceInterface;
use App\Http\Services\User\UserServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use JWTAuth;
use App\User;
use App\Role;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Collection;
use Validator;
class JWTAuthService implements JWTAuthServiceInterface
{

    protected $osmService;
    protected $userService;

    public function __construct(OsmServiceInterface $osmService,UserServiceInterface $userService)
    {
        $this->osmService = $osmService;
        $this->userService = $userService;
    }


    use ValidatesRequests;

    public function loginOrFail(Request $request)
    {

        $credentials= $request->only('email', 'password');

        //JSON Web Token Authentication service, return token if successfull.
        if ( ! $token = JWTAuth::attempt($credentials))
        {
            return Response::json(false, HttpResponse::HTTP_UNAUTHORIZED);
        }

        $user =  $this->fetchUserData($request->email);
//        dd($user);


        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,

        ],HttpResponse::HTTP_OK);
    }



    public function registerOrFail(Request $request)
    {

            //recibo request con name,email,password
            //comprobar si el usuario existe
            //si existe, envíar 409 status error
            //si no existe, enviar 201 status created.
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
            ];

            $input = $request->only(
                'name',
                'email',
                'password'
            );

            $validator = Validator::make($input, $rules);

            if($validator->fails())
            {
                $error = $validator->messages()->toJson();
                return response()->json(['success'=> false, 'error'=> $error],
                    HttpResponse::HTTP_BAD_REQUEST);
            }

            $email = $request->email;
            $name = $request->name;
            $password = bcrypt($request->password);

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);


            $role = new Role();
            $role->name = 'normie';
            $user->roles()->save($role);
            $user->save();

            $token = JWTAuth::fromUser($user);

            return response()->json([
                'success' => true,
                'data' => ['token' => $token]], HttpResponse::HTTP_CREATED);



//                return response()->json([
//                    'error' => 'User already exists.'],
//                    HttpResponse::HTTP_CONFLICT);


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


    /**
     * @param $email
     * @return mixed
     */
    private function fetchUserData($email)
    {
        try
        {
            $user = User::where('email', $email)->get()->first();

        }
        catch (ModelNotFoundException $e)
        {
            return $e;
        }

        $roles = $user->roles()->get();
        if(isset($roles))
            $user->roles =  $roles;

        $subscription = $user->subscription()->get()->first();

        if(isset($subscription))
        {
            $barsInSub = $subscription->bars()->get();

            $node_data = $this->query_node_data($barsInSub);

            $user->subscription = json_decode($node_data);
        }

        $bars_owned = $this->userService->ownerBarList($user);
        $user->bars_owned = $bars_owned;

        return $user;

    }

    //Repeated function, should be refactored.
    private function query_node_data($barsInSub)
    {
        $node_array = [];

        foreach($barsInSub as $bar)
        {
            array_push($node_array, $bar->node);
        }

        return $this->osmService->query_only_nodes($node_array);
    }

}