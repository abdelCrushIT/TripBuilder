<?php

/**
 * AirportController.php
 * author     Abdel <abdelhalim.drioueche@gmail.com>
 * copyright  2017 Abdel
 * see        https://github.com/abdelCrushIT/TripBuilderApi
 */

namespace App\Repositories;

use Illuminate\Http\Request;

/**
 * AirportController
 * AirportController class
 */
class CurlRepository 
{
	const APIDOMAINE = 'http://tripbuilderapi';
	public function execute($method= 'GET', $url) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, self::APIDOMAINE.$url);
		if($method != 'GET') {
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$results = curl_exec($curl);
		//print_r($results);exit;
		curl_close($curl);
		return json_decode($results);
	}


}