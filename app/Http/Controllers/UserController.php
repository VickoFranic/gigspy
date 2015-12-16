<?php

namespace App\Http\Controllers;

use Auth;
use App\Page;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\FacebookHelper;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	/**
	 * @var App\User $user
	 */
	protected $user;

	/**
	 * @var Helpers\FacebookHelper $facebook
	 */
	protected $facebook;

	/**
	 * @var App\Page
	 */
	protected $pages;


	public function __construct(FacebookHelper $facebook)
	{
		$this->user = Auth::user();
		$this->pages = $this->user->pages;
		$this->facebook = $facebook;
	}

	/**
	 * Show User Dashboard, generate pagesUrl if there are no pages for User
	 * @return View
	 */
    protected function userDashboard() 
    {
    	if (count($this->pages) == 0) {
    		$pagesUrl = $this->facebook->generateUserPagesUrl();
    		Session::put('pagesUrl', $pagesUrl);

    		return view('user.dashboard')->with('user', $this->user);
    	}
    	return view('user.dashboard')->with('user', $this->user)
    								 ->with('pages', $this->pages);
    }

}
