<?php
/**
 * Created by PhpStorm.
 * User: pdolinaj
 * Date: 13/09/18
 * Time: 08:52
 */
namespace api\consumption;

use api\ApiClient;

class Prisoner extends ApiClient
{
    /**
     * /prisoner/lea
     *
     * Accepts:
     *      GET
     * Headers:
     *      Authorization: Bearer [token]
     *      Content-Type: application/json
     */
    public function getPrisoner($name)
    {
        $response = $this->getApiClient()->get('/prisoner/'.$name, [
            'headers' => [
                'Authorization' => 'Bearer '.$this->getApiToken(),
                'Content-Type' => 'application/json',
            ]
        ]);
        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }
}