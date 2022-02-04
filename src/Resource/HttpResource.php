<?php

namespace Metro\Resource;

use GuzzleHttp\Client;
use Metro\Contract\IResource;

class HttpResource implements IResource
{
    private string $url;
    private string $method;
    private Client $httpClient;

    public function __construct(string $url, string $method = 'get')
    {
        $this->url = $url;
        $this->method = $method;
        $this->httpClient = new Client();
    }

    public function read(): string
    {
        $response = $this->httpClient->request($this->method, $this->url);
        return $response->getBody()->getContents();
    }
}