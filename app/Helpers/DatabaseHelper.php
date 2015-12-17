<?php
namespace App\Helpers;

use App\Page;
/**
 *
 * GigSpy custom Facebook API helper class
 *
 */
class DatabaseHelper {

	public function updatePageData(Page $page, $data) {

		$page->avatar = $data['picture']['url'];
		$page->about = "TEST";

		if (! isset($data['hometown']))
			$page->hometown = "Missing hometown";
		else
			$page->hometown = $data['hometown'];

		if(! isset($data['about']))
			$page->about = 'Missing about section';
		else
			$page->about = $data['about'];

		if(! isset($data['bio']))
			$page->bio = 'Missing bio section';
		else
			$page->bio = $data['bio'];	

		if(! isset($data['band_members']))
			$page->band_members = 'Missing band members section';
		else
			$page->band_members = $data['band_members'];

		if(! isset($data['artists_we_like']))
			$page->artists_we_like = 'Missing artists that band likes';		
		else
			$page->artists_we_like = $data['artists_we_like'];

		if(! isset($data['booking_agent']))
			$page->booking_agent = 'Missing band`s booking agent info';
		else
			$page->booking_agent = $data['booking_agent'];	

		if(! isset($data['website'])) 
			$page->website = 'Missing website link';
		else
			$page->website = $data['website'];				 

		$page->save();

		return $page;
	}
}