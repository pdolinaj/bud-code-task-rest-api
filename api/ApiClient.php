<?php
/**
 * Created by PhpStorm.
 * User: pdolinaj
 * Date: 13/09/18
 * Time: 08:53
 */
namespace api;

use GuzzleHttp\Client;

class ApiClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var $token
     */
    private $token;

    public function __construct($token = null)
    {
        $this->client = new Client([
            'base_uri' => 'https://death.star.api/​',
            'cert' => ['[/var/www/bud-code-task-rest-api/config/ssl/server.crt.pem'],
            'ssl_key' => ['[/var/www/bud-code-task-rest-api/config/ssl/server.key.pem']
        ]);

        $this->token = $token;
    }

    public function getApiClient()
    {
        return $this->client;
    }

    public function getApiToken()
    {
        return $this->token;
    }

}