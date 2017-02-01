<?php

/**
 * AirportController.php
 * author     Abdel <abdelhalim.drioueche@gmail.com>
 * copyright  2017 Abdel
 * see        https://github.com/abdelCrushIT/TripBuilderApi
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CurlRepository;

/**
 * AirportController
 * AirportController class
 */
class AirportController extends Controller
{
	private $repository;

	public function __construct(CurlRepository $curlRepository) {
		$this->repository = $curlRepository;
	}

	public function getAll() {
		$url = '/airports';
		$results = $this->repository->execute('GET', $url);
		$airports = $results->data;
		return view('airports', ['airports' => $airports]);
	}
}