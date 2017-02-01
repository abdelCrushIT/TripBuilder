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
class TripController extends Controller
{
	private $repository;

	public function __construct(CurlRepository $curlRepository) {
		$this->repository = $curlRepository;
	}

	public function getAll() {
		$url = '/trips';
		$results = $this->repository->execute('GET', $url);
		$trips = $results->data;
		return view('trips', ['trips' => $trips]);
	}

	public function get($id) {
		$url = "/trips/$id";
		$results = $this->repository->execute('GET', $url);
		$trip = $results->trip;
		$flights = $results->flights;
		return view('trip', ['trip' => $trip, 'flights' => $flights]);
	}

	public function addFlight(Request $request) {
		$requestData = $request->all();
		$url = "/trips/".$requestData['id']."/flights/".$requestData['depart_airport']."-".$requestData['dest_airport'];
		$result = $this->repository->execute('PUT', $url);
		return redirect()->back()->with('message', $result->message);
		
	}

	public function deleteFlight(Request $request) {
		$requestData = $request->all();
		$url = "/trips/".$requestData['id']."/flights/".$requestData['depart_airport']."-".$requestData['dest_airport'];
		$result = $this->repository->execute('DELETE', $url);
		return redirect()->back()->with('message', $result->message);
		
	}
}