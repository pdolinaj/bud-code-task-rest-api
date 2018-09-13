<?php
/**
 * Created by PhpStorm.
 * User: pdolinaj
 * Date: 13/09/18
 * Time: 08:52
 */
namespace api\consumption;

use \api\ApiClient;

class Token extends ApiClient
{
    /**
     * /token This endpoint accepts POST requests.
     *
     * /Token
     * Credentials:
     *      Client Secret - Alderan
     *      Client ID - R2D2
     * Accepts:
     *      POST
     * Headers:
     *      Content-Type: application/x-www-form-urlencoded
     * Body:
     *      grant_type = client_credentials
     * Returns:
     *      {
     *          "access_token": "e31a726c4b90462ccb7619e1b51f3d0068bf8006",
     *          "expires_in": 99999999999,
     *          "token_type": "Bearer",
     *          "scope": “TheForce”
     *      }
     */
    public function getToken($clientId, $clientSecret)
    {
        $response = $this->getApiClient()->post('/token', [
            'auth' => [$clientId, $clientSecret],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'body' => ['grant_type' => 'client_credentials']
            ]

        ]);

        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }

}