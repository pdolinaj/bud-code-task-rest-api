<?php
require_once 'CommonTestCase.php';

/**
 * Created by PhpStorm.
 * User: pdolinaj
 * Date: 13/09/18
 * Time: 09:39
 */

use api\consumption\Token;
use api\consumption\Reactor;

class ReactorTest extends CommonTestCase
{
//    public function testCanDeleteReactorReal(): void
//    {
//        //get token
//        $tokenApi = new Token();
//        $token = $tokenApi->getToken('R2D2', 'Alderan');
//
//        //delete reactor
//        $reactorApi = new Reactor($token['access_token']);
//        $response = $reactorApi->deleteReactor(1);
//
//        //don't know what the output is ?
//    }

    public function testCanDeleteReactorMocked(): void
    {
        $mockedClient = $this->getMockedClient(202, []);

        $response = $mockedClient->delete('/reactor/exhaust/1', [
            'headers' => [
                'Authorization' => 'Bearer e31a726c4b90462ccb7619e1b51f3d0068bf8006',
                'Content-Type' => 'application/json',
                'x-torpedoes' => 2
            ]
        ]);

        $reactor = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        $this->assertEquals(202, $response->getStatusCode());
    }

}
