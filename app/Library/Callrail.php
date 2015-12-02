<?php

namespace App\Library;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Callrail
{

	protected $base_uri = "https://api.callrail.com";


	function curl_request($api_url)
	{
		$api_key = 'f530a1b7582b85df3d8e48a691950562';

		$ch = curl_init($api_url);

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Token token=\"{$api_key}\""));

		$json_data = curl_exec($ch);

		$parsed_data = json_decode($json_data);
		curl_close($ch);

		return $parsed_data;
	}


    /**
     * Consume Callrail API from the provided url
     * @param string $api_url - url to a certain callrail API part "/v1/companies.json"
     */
    function api_call($api_url, $params = "")
    {

    	$api_key = "f530a1b7582b85df3d8e48a691950562";

    	if (empty($params) == false) {
    		$params = "?".http_build_query($params);
    	}


    	$client = new Client;

    	$request = $client->request('GET', $this->base_uri.$api_url.$params, [
    		'headers' => [
    		'Authorization' => 'Token token="'.$api_key.'"'
    		]
    		]);

    	$result = json_decode($request->getBody());

    	return $result;

    }



    /**
     * Get companies
     * @param array $query_params - array of arguments for the companies request can be
     * below are arguments that can be passed to the $query_params array
     *
     * @param integer per_page - How many companies to return for this request (default 100, maximum 250).
     * @param integer page - Page number that should be returned for this request (the first page is 1).
     * @return array - an array of companies
     */
    public function companies($query_params = [])
    {
		// if no parameters don't pass them to api call
    	if ( empty($query_params) )
    		return $this->api_call("/v1/companies.json")->companies;


    	return $this->api_call("/v1/companies.json", $query_params)->companies;

    }


    /**
     * Get users
     * @param array $query_params - array of arguments for the users request can be
     * below are arguments that can be passed to the $query_params array
     *
     * @param integer per_page - How many users to return for this request (default 100, maximum 250).
     * @param integer page - Page number that should be returned for this request (the first page is 1).
     * @return array - an array of users
     */
    public function users($query_params = [])
    {
		// if no parameters don't pass them to api call
    	if ( empty($query_params) )
    		return $this->api_call("/v1/users.json")->users;


    	return $this->api_call("/v1/users.json", $query_params)->users;
    }


    /**
     * Get sources
     * @param array $query_params - array of arguments for the sources request can be
     * below are arguments that can be passed to the $query_params array
     *
     * @param integer per_page - How many sources to return for this request (default 100, maximum 250).
     * @param integer page - Page number that should be returned for this request (the first page is 1).
     * @param ineteger company_id - if provided, only return sources belonging to this company.
     * @return array - an array of users
     */
    public function sources($query_params = [])
    {
		// if no parameters don't pass them to api call
    	if ( empty($query_params) )
    		return $this->api_call("/v1/sources.json")->sources;


    	return $this->api_call("/v1/sources.json", $query_params)->sources;
    }



    public function source_trackers($company_id, $query_params = [])
    {
		// if no parameters don't pass them to api call
    	if ( empty($query_params) )
    		return $this->api_call("/v1/companies/$company_id/source_trackers.json")->source_trackers;


    	return $this->api_call("/v1/companies/$company_id/source_trackers.json", $query_params)->source_trackers;
    }

}
