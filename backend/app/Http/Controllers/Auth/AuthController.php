<?php

namespace ProjectManager\Http\Controllers\Auth;

use ProjectManager\User;
use Validator;
use ProjectManager\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    /**
    * Create a new authentication controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    
    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            ]);
        }
        
        /**
        * Create a new user instance after a valid registration.
        *
        * @param  array  $data
        * @return User
        */
        protected function create(array $data)
        {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                ]);
            }
            
            public function authenticate(Request $request)
            {
                // grab credentials from the request
                $credentials = $request->only('email', 'password');
                
                try {
                    // attempt to verify the credentials and create a token for the user
                    if (! $token = JWTAuth::attempt($credentials)) {
                        return response()->json(['error' => 'invalid_credentials'], 401);
                    }
                } catch (JWTException $e) {
                    // something went wrong whilst attempting to encode the token
                    return response()->json(['error' => 'could_not_create_token'], 500);
                }
                
                // all good so return the token
                return response()->json(compact('token'));
            }
            
            public static function getAuthenticatedUser()
            {
                try {
                    
                    if (! $user = JWTAuth::parseToken()->authenticate()) {
                        return response()->json(['user_not_found'], 404);
                    }
                    
                } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    
                    return response()->json(['token_expired'], $e->getStatusCode());
                    
                } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    
                    return response()->json(['token_invalid'], $e->getStatusCode());
                    
                } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                    
                    return response()->json(['token_absent'], $e->getStatusCode());
                    
                }

                // the token is valid and we have found the user via the sub claim
                return $user;
            }
        }
        