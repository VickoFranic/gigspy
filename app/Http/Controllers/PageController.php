<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\Page;
use App\Http\Requests;
use App\Helpers\FacebookHelper;
use App\Http\Controllers\Controller;
use App\Helpers\DatabaseHelper;

class PageController extends Controller
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
	 * @var Helpers\DatabaseHelper $dbhelper
	 */
	protected $dbhelper;


	public function __construct(FacebookHelper $facebook, DatabaseHelper $dbhelper)
	{
		$this->user = Auth::user();
		$this->facebook = $facebook;
		$this->dbhelper = $dbhelper;
	}

	public function savePages()
	{
		$pagesCollection = array();
		$pages = $this->facebook->userPagesArray();

		if (count($pages) == 0) {
			return redirect('dashboard')->with('no_data', 'You have no band pages with admin privileges, sorry.');
		}

		foreach ($pages as $page) {
			$pagesCollection[] = new Page([ 'facebook_id'	=> $page->getField('id'),
											'name'			=> $page->getField('name'),
											'page_token'	=> $page->getField('access_token')
										]);
		}

	 	$result = $this->user->pages()->saveMany($pagesCollection);

	 	return redirect('dashboard');
	}

	public function pageData($page_id) 
	{	
		// Checking if request is legitimate page that exists in DB
		if (! $page = Page::find($page_id))
			abort(404);
		// Check if page user is identical to app user
		if ($page->user->id != $this->user->id)
			abort(500);

		// Get Page data from Facebook API
		$response = $this->facebook->getPageDataFromFacebook($page_id, $page->page_token)->asArray();

		// Update page data in DB
		$this->dbhelper->updatePageData($page, $response);

		return view('user.dashboard')->with('user', $this->user)
									 ->with('pages', $this->user->pages)
									 ->with('activePage', $page);
	}
}