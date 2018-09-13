<?php

/**
 * Created by PhpStorm.
 * User: pdolinaj
 * Date: 13/09/18
 * Time: 08:52
 */
namespace api\consumption;

use api\ApiClient;

class Reactor extends ApiClient
{
    /**
     * /reactor/exhaust/1, this endpoint accepts DELETE requests only.
     *
     * /reactor/exhaust/1
     * Accepts:
     *      DELETE
     * Headers:
     *      Authorization: Bearer [token]
     *      Content-Type: application/json
     *      x-torpedoes: 2
     */
    public function deleteReactor($reactorId)
    {
        $response = $this->getApiClient()->delete('/reactor/exhaust/'.$reactorId, [
            'headers' => [
                'Authorization' => 'Bearer '.$this->getApiToken(),
                'Content-Type' => 'application/json',
                'x-torpedoes' => 2
            ]
        ]);
        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }
}