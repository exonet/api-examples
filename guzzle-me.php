<?php
/*
 * Install the Guzzle library:
 * `composer require guzzlehttp/guzzle:~6.0`
 */

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

// The API Endpoint to access.
$endpoint = '/me';

// The API token as provided by Exonet.
$token = trim(file_get_contents(__DIR__.'/api-token.txt'));

// Create the client and the request.
$client = new Client();
$request = new Request(
    'GET',
    sprintf('https://api.exonet.nl/%s', ltrim($endpoint, '/')),
    [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/vnd.Exonet.v1+json'
    ]);

// Send the request and parse the response.
try {
    $apiResponse = $client->send($request);
    $decodedResponse = json_decode($apiResponse->getBody());
    echo "\n";
    echo sprintf('Hello %s!', $decodedResponse->data->attributes->name);
    echo "\n\n";
    echo str_repeat('-', 10).'[ Full decoded response ]'.str_repeat('-', 10);
    echo "\n\n";

    print_r($decodedResponse);
} catch (ClientException $clientException) {
    echo $clientException->getMessage();
}

echo "\n";
