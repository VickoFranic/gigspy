<?php
namespace App\Helpers;

use Facebook\Facebook;
/**
 *
 * GigSpy custom Facebook API helper class
 *
 */
class FacebookHelper {
	
	/**
	 * @var Facebook $facebook
	 */
	protected $facebook;

	public function __construct(Facebook $facebook) 
	{
		$this->facebook = $facebook;
	}

	public function generateLoginUrl() 
	{
		return $this->facebook
					->getRedirectLoginHelper()
					->getLoginUrl('http://gigspy.dev/userData', ['user_location']);
	}

	public function generateUserPagesUrl() 
	{
		return $this->facebook
					->getRedirectLoginHelper()
					->getLoginUrl('http://gigspy.dev/pages', ['manage_pages']);
	}

	public function getAccessTokenFromRedirect() 
	{
		try {
			$token = $this->facebook
						  ->getRedirectLoginHelper()
						  ->getAccessToken();
			return $token;

		} catch (\Exception $e) {
			abort(500);
		}
	}

	public function getUserFromRedirect() 
	{
		$token = $this->getAccessTokenFromRedirect();

		try {
            $user = $this->facebook
                         ->get('/me?fields=id,name,picture.width(140).height(140),email,location', $token)
                         ->getGraphUser();
            return $user;

	    } catch (\Exception $e) {
	            abort(500);
        }
	}

	public function getUserPagesFromRedirect() 
	{
		$token = $this->getAccessTokenFromRedirect();

		try {
            $pages = $this->facebook
                         ->get('/me/accounts', $token)->getGraphEdge();
            return $pages;

	    } catch (\Exception $e) {
	            abort(500);
        }
	}

	/**
	 * Call Facebook API and find user pages, check category
	 *
	 * @return array of Facebook PageNodes
	 */
    public function userPagesArray()
    {
    	$pages = array();
		$data = $this->getUserPagesFromRedirect();

		foreach ($data as $page) {
			if ($page->getField('category') == 'Musician/Band')
				$pages[] = $page;
		}
    	return $pages;
    }

    /**
	 * Call Facebook API and fetch page data
	 *
	 * @param Facebook ID of the page 	$page_id
	 * @param Database Access token 	$access_token
	 *
	 * @return GraphPage
	 */
    public function getPageDataFromFacebook($page_id, $access_token)
    {
    	$params = array (
    				'fields' => 'access_token, picture.width(140).height(140){url}, hometown, about, bio, band_members, artists_we_like, booking_agent, website'
    				);

    	$request = $this->facebook->request('GET', '/' . $page_id, $params, $access_token);

    	try {
    		$response = $this->facebook->getClient()->sendRequest($request);
    	} catch (\Exception $e) {
  			abort(505);
    	}

    	return $response->getGraphPage();
    }
}