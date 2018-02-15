// The API Endpoint to access.
const endpoint = '/me';

// Required modules.
const fs = require('fs');
const http = require('https');

// Read the API token.
const token = fs.readFileSync('./api-token.txt', 'utf8');

// Set the HTTP options.
var options = {
    hostname: 'api.exonet.nl',
    path: '/' + endpoint.replace(/^\/+/g, ''),
    method: 'GET',
    headers: {
        'Authorization': 'Bearer ' + token,
        'Accept': 'application/vnd.Exonet.v1+json'
    }
};

// Make the request.
http.request(options, function (res) {
    res.on('data', function (chunk) {
        const decodedResponse = JSON.parse(chunk);

        console.log();
        console.log('Hello ' + decodedResponse.data.attributes.name);
        console.log();
        console.log('-'.repeat(10) + '[ Full decoded response ]' + '-'.repeat(10));
        console.log(decodedResponse);
    });
}).end();
