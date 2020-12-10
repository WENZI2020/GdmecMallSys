<?php

namespace Huoshaotuzi\Sociate\Driver;

use GuzzleHttp\Client;
use Huoshaotuzi\Sociate\Driver;
use Huoshaotuzi\Sociate\Config;

class Github extends Driver
{
    protected $name = 'github';
    protected $authoriteCodeUrl = 'https://github.com/login/oauth/authorize';
    protected $authoriteTokenUrl = 'https://github.com/login/oauth/access_token';
    protected $userInfoUrl = 'https://api.github.com/user';

    public function __construct()
    {
        $this->config = new Config($this->name);
    }

    public function getAuthoriteCodeUrl($state = '')
    {
        $params = [
            'client_id' => $this->config->getClientId(),
            'redirect_uri' => $this->config->getRedirect(),
            'state' => $state,
        ];

        return $this->authoriteCodeUrl . '?' . http_build_query($params);
    }

    public function getUser($response)
    {
        $client = new Client();
        $response = $client->get($this->userInfoUrl, [
            'verify' => false,
            'headers' => ['Authorization'=>'token '.$response['access_token']],
        ])->getBody()->getContents();

        return json_decode($response, true);
    }

    public function getAccessToken()
    {
        $code = request('code');
        $params = [
            'code' => $code,
            'client_id' => $this->config->getClientId(),
            'client_secret' => $this->config->getClientSecret(),
            'redirect_uri' => $this->config->getRedirect(),
            'state' => $this->config->getRedirect(),
        ];
        $response = $this->request('post', $this->authoriteTokenUrl, $params);

        return $this->queryToArray($response);
    }
}
