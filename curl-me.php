<?php

// The API Endpoint to access.
$endpoint = '/me';

// The API token as provided by Exonet.
$token = trim(file_get_contents(__DIR__.'/api-token.txt'));

// Create the cURL resource.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, sprintf('https://api.exonet.nl/%s', ltrim($endpoint, '/')));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer '.$token,
    'Accept: application/vnd.Exonet.v1+json',
]);

// Send the request and store the response.
$apiResponse = curl_exec($ch);

if (!$apiResponse) {
    echo sprintf('Error: "%s" - Code: %d', curl_error($ch), curl_errno($ch));
} else {
    $decodedResponse = json_decode($apiResponse);
    echo "\n";
    echo sprintf('Hello %s!', $decodedResponse->data->attributes->name);
    echo "\n\n";
    echo str_repeat('-', 10).'[ Full decoded response ]'.str_repeat('-', 10);
    echo "\n\n";

    print_r($decodedResponse);
}

// Close request to clear up some resources
curl_close($ch);

echo "\n";
