<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Facebook;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    protected $facebook;


    public function __construct(Facebook $facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Show app index page, check if user logged in
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            return redirect('/welcome');
        }

        $url = $this->facebook->getLoginUrl(['user_location']);
        return view('index')->with('url', $url);
    }

    /**
     * Get Access token from Facebook Redirect, call Facebook API. Redirect to welcome if Authenticated, else create User
     * @return Redirect | Exception 
     */
    public function getUserFromRedirect()
    {
        $token = $this->getAccessToken();
        
        try {
            $user = $this->facebook
                         ->get('/me?fields=id,name,picture.width(149).height(149),email,location', $token)
                         ->getGraphUser()->asArray();

            if ($userDB = User::where('facebook_id', $user['id'])->first()) {
                Auth::loginUsingId($userDB['id'], true);
                Session::put('old', true);
                return redirect('/welcome');
            }

            $this->createUser($user);
                return redirect('/welcome');

        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            abort(500);
        }
    }

    protected function getAccessToken()
    {
        try {
            $token = $this->facebook->getAccessTokenFromRedirect();
            return $token;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            abort(500);
        }
    }

    /**
     * Build new User Model from array
     *
     * @param @array
     *
     * @return App\User
     */
    public function buildUserFromArray(array $user)
    {
        $new = new User;

        $new->facebook_id = $user['id'];
        $new->name = $user['name'];
        $new->avatar = $user['picture']['url'];

        if (!isset($user['email']))
            $new->email = 'No Email';
        else
            $new->email = $user['email'];

        if (!isset($user['location']))
            $new->location = 'No location';
        else
            $new->location = $user['location']['name'];
        
        return $new;
    }

    /**
     * Save user to database
     *
     * @param array $user
     */
    protected function createUser(array $user)
    {
        $new = $this->buildUserFromArray($user);
        $userDB = User::create($new->toArray());

        if (! $userDB->id) {
            abort(500);
        }

        Auth::loginUsingId($userDB['id'], true);
    }

    /**
     * User authenticated - show welcome page
     * @return View
     */
    public function showWelcome()
    {
        $user = Auth::user();
        return view('index')->with('user', $user);
    }
}
