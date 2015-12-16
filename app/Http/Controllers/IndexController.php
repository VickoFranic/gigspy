<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use Validator;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\FacebookHelper;
use Facebook\GraphNodes\GraphUser;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    protected $facebook;

    public function __construct(FacebookHelper $facebook) {
        $this->facebook = $facebook;
    }

    /**
     * Show app index page, check if user logged in
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPage()
    {   
        if (Auth::user()) {
            return redirect('/welcome');
        }
        $url = $this->facebook->generateLoginUrl();
        return view('index')->with('url', $url);
    }

    /**
     * Get Facebook user from callback and make login or create user
     *
     * @return Response | Exception 
     */
    public function loginViaFacebook()
    {   
        $userFB = $this->facebook->getUserFromRedirect();
        $userDB = User::where('facebook_id', $userFB->getId())->first();

        if (! is_null($userDB)) {
            // User already exists, check "first time visit" state (old)
            if ($userDB->old == 0) {
                $userDB->update(['old' => 1]);
                $userDB->save();
            }
            //Authenticate user
            Auth::loginUsingId($userDB->id);
            return redirect('/welcome');
        }
        // User not found in database, create it
        $this->createAndLoginUser($userFB);
        return redirect('/welcome');
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

    /**
     * Logout user
     *
     */
    public function logoutUser() 
    {   
        $userDB = User::find(Auth::user()->id);
        $userDB->update(['last_login' => Carbon::now()->toDayDateTimeString()]);
        $userDB->save();

        Auth::logout();
        return redirect('/');
    }


    /***** HELPER FUNCTIONS *****/

    /**
     * Save user to database
     *
     * @param array $user
     */
    protected function createAndLoginUser(GraphUser $user)
    {
        $new = $this->validateUserData($user);
        $userDB = User::create($new->toArray());

        if (! $userDB->id) {
            abort(500);
        }
        Auth::loginUsingId($userDB->id);
    }

    /**
     * Build new User Model from Facebook GraphUser object
     *
     * @param GraphUser $user
     *
     * @return App\User $new
     */
    protected function validateUserData(GraphUser $user)
    {
        $new = new User;

        $new->facebook_id = $user->getId();
        $new->name = $user->getName();
        $new->avatar = $user->getPicture()->getUrl();
        $new->last_login = Carbon::now()->toDayDateTimeString();

        if (is_null($user->getEmail()))
            $new->email = 'No Email';
        else
            $new->email = $user->getEmail();

        if (is_null($user->getLocation()))
            $new->location = 'No location';
        else
            $new->location = $user->getLocation()->getName();
        
        return $new;
    }
}
