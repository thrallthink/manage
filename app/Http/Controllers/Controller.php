<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function call($method, $api_url, Request $request)
    {
    	// dd($api_url);
		$request = Request::create($api_url, $method);           
		$teams = Route::dispatch($request);
		// dd($teams->content());
		$teams = json_decode($teams->content(), true);
		if (isset($teams['data']))
			$teams = $teams['data'];
		return $teams;
    }
}
