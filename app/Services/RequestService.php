<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\RequestInterface;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\App;

class RequestService
{
    /**
     * get profile
     * @param Request $request
     * @return object json response
     */
    public function getProfile($request) {
        $requestClass = App::make(RequestInterface::class);

        $requestURL = $requestClass->getUrl($request);

        $response = $this->makeApiCall($requestURL);

        $profile = json_decode($response->getBody()->getContents()); 
        
        return $profile;
    }

    /**
     * function for sending the API request
     * additional logic to do with the request can go here
     * @param string $requestURL
     * @return object $response
     */
    public function makeApiCall ($requestURL) {
        $guzzle = new Client([
            'retry_on_status' => [429, 503, 500],
            'max_retry_attempts' => 5,
        ]);
        $response = $guzzle->get($requestURL);

        return $response;
    }

    /**
     * get profile avatar
     * different clients have different ways to do it
     * so we make the call again to access the client specific avatar method
     * @param Request $request
     * @return mixed
     */
    public function getProfileAvatar($request) {
        $requestClass = App::make(RequestInterface::class);

        $profile = $this->getProfile($request);

        $avatar = $requestClass->getAvatar($profile);

        return $avatar;
    }

}
