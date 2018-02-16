/*
 * Install the Superagent library:
 * `npm install superagent`
 */

const request = require('superagent');
const fs = require('fs');

// Read the API token.
const token = fs.readFileSync('./api-token.txt', 'utf8').trim();

request
    .get('https://api.exonet.nl/me')
    .set('Authorization', 'Bearer ' + token)
    .set('Accept', 'application/vnd.Exonet.v1+json')
    .end(function (err, res) {
        if (err || !res.ok) {
            console.log('Oh no! An error.');
        } else {
            console.log();
            console.log('Hello ' + res.body.data.attributes.name);
            console.log();
            console.log('-'.repeat(10) + '[ Full decoded response ]' + '-'.repeat(10));
            console.log(res.body);
        }
    });
