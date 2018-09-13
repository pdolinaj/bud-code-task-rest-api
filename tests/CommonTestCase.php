<?php
require_once realpath(dirname(__FILE__) . '/../vendor') . '/autoload.php';
require_once realpath(dirname(__FILE__) . '/../api') . '/ApiClient.php';
require_once realpath(dirname(__FILE__) . '/../api/consumption') . '/Token.php';

/**
 * Created by PhpStorm.
 * User: pdolinaj
 * Date: 13/09/18
 * Time: 09:39
 */

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;

use api\consumption\Token;

class CommonTestCase extends TestCase
{

    public function testCanGetToken(): void
    {
        //get token
        $tokenApi = new Token();
        $token = $tokenApi->getToken('R2D2', 'Alderan');

        $this->assertArrayHasKey('access_token', $token);
        $this->assertArrayHasKey('expires_in', $token);
        $this->assertArrayHasKey('token_type', $token);
        $this->assertArrayHasKey('scope', $token);
    }

    public function getMockedClient($status, $body = null)
    {
        $mock = new MockHandler([new Response($status, [], \GuzzleHttp\json_encode($body))]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        return $client;
    }

}
