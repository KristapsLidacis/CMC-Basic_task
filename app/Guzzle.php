<?php

namespace App;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
class Guzzle
{
    public function getGuzzle(): array
    {
        $bodyTest = null;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://sandbox-api.coinmarketcap.com',
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);

        $headers = ['Accepts' => 'application/json',
            'X-CMC_PRO_API_KEY' => '9d8f7e96-b92e-4fe3-8c8c-564fc103b4bc'];
        $body = '';
        $request = new Request('GET', 'https://sandbox-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=1&convert=EUR', $headers);
        $response = $client->send($request);
        $bodyTest = $response->getBody();
        return json_decode($bodyTest->getContents(), true)['data'];
    }
}