<?php
require_once 'CommonTestCase.php';

/**
 * Created by PhpStorm.
 * User: pdolinaj
 * Date: 13/09/18
 * Time: 09:39
 */

use api\consumption\Token;
use api\consumption\Prisoner;

class PrisonerTest extends CommonTestCase
{

//    public function testCanGetPrisonerReal(): void
//    {
//        //get token
//        $tokenApi = new Token();
//        $token = $tokenApi->getToken('R2D2', 'Alderan');
//
//        //get prisoner
//        $prisonerApi = new Prisoner($token['access_token']);
//        $prisoner = $prisonerApi->getPrisoner('lea');
//
//        $this->assertArrayHasKey('cell', $prisoner);
//        $this->assertArrayHasKey('block', $prisoner);
//    }

//    public function testCanGetPrisonerMocked(): void
//    {
//        $body = [
//            'cell' => '01000011 01100101 01101100 01101100 00100000 00110010 00110001 00111000 00110111',
//            'block' => '01000100 01100101 01110100 01100101 01101110 01110100 01101001 01101111 01101110 00100000 01000010 01101100 01101111 01100011 01101011 00100000 01000001 01000001 00101101 00110010 00110011 00101100'
//        ];
//
//        $mockedClient = $this->getMockedClient(200, $body);
//
//        $response = $mockedClient->get('/prisoner/lea', [
//            'headers' => [
//                'Authorization' => 'Bearer e31a726c4b90462ccb7619e1b51f3d0068bf8006',
//                'Content-Type' => 'application/json',
//            ]
//        ]);
//
//        $prisoner = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
//
//
//        $this->assertArrayHasKey('cell', $prisoner);
//        $this->assertArrayHasKey('block', $prisoner);
//
//        $this->assertEquals($body, $prisoner);
//    }


//    public function testCanTranslateBinaryToTextSuccess()
//    {
//        $prisonerService = new api\processing\PrisonerService();
//
//        $data = [
//            'cell' => '01000011 01100101 01101100 01101100 00100000 00110010 00110001 00111000 00110111',
//            'block' => '01000100 01100101 01110100 01100101 01101110 01110100 01101001 01101111 01101110 00100000 01000010 01101100 01101111 01100011 01101011 00100000 01000001 01000001 00101101 00110010 00110011 00101100'
//        ];
//
//        $dataExpected = [
//            'cell' => 'Cell 2187',
//            'block' => 'Detention Block AA-23,'
//        ];
//
//        $dataTranslated = $prisonerService->translateRecord(\GuzzleHttp\json_encode($data));
//
//        $this->assertEquals($dataExpected, $dataTranslated);
//    }

    public function testCanTranslateBinaryToTextFailure()
    {
        $prisonerService = new api\processing\PrisonerService();

        $data = [
            'cell' => '010000110110010101101100011011000010000000110010001100010011100000110111',
            'block' => '01000100011001010111010001100101011011100111010001101001011011110110111000100000010000100110110001101111011000110110101100100000010000010100000100101101001100100011001100101100'
        ];

        $dataExpected = [
            'cell' => 'Cell 2187',
            'block' => 'Detention Block AA-23,'
        ];

        $dataTranslated = $prisonerService->translateRecord(\GuzzleHttp\json_encode($data));

        print_r($dataTranslated);exit;

        $this->assertNotEquals($dataExpected, $dataTranslated);
    }

}
