<?php
require_once 'CommonTestCase.php';

/**
 * Created by PhpStorm.
 * User: pdolinaj
 * Date: 13/09/18
 * Time: 09:39
 */

use api\consumption\Token;

class TokenTest extends CommonTestCase
{

//    public function testCanGetTokenReal(): void
//    {
//        //get token
//        $tokenApi = new Token();
//        $token = $tokenApi->getToken('R2D2', 'Alderan');
//
//        $this->assertArrayHasKey('access_token', $token);
//        $this->assertArrayHasKey('expires_in', $token);
//        $this->assertArrayHasKey('token_type', $token);
//        $this->assertArrayHasKey('scope', $token);
//    }

    public function testCanGetTokenMocked(): void
    {
        $body = [
            'access_token' => 'e31a726c4b90462ccb7619e1b51f3d0068bf8006',
            'expires_in' => 99999999999,
            'token_type' => 'Bearer',
            'scope' => 'TheForce'
        ];

        $mockedClient = $this->getMockedClient(200, $body);

        $response = $mockedClient->post('/token', [
            'auth' => ['R2D2', 'Alderan'],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'body' => ['grant_type' => 'client_credentials']
            ]
        ]);

        $token = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        $this->assertArrayHasKey('access_token', $token);
        $this->assertArrayHasKey('expires_in', $token);
        $this->assertArrayHasKey('token_type', $token);
        $this->assertArrayHasKey('scope', $token);
    }

}
