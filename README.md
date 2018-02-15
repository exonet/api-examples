## Exonet API Examples

This directory contains a few examples written in PHP, JavaScript and Python on how to access the Exonet API by using a 
token. For each example there are two different version: one without dependencies and one with the most used dependency
for making HTTP requests.

### Installation
To use any of the examples, you'll need to place the API token as provided by Exonet in the file `api-token.txt`. This
file is used by all examples. If you'll like to try the examples with the dependencies, you first have to install them:

```bash
$ composer require guzzlehttp/guzzle:~6.0
$ npm install superagent
$ pip install requests
```

### Running the examples:
```bash
$ php curl-me.php
$ php guzzle-me.php
$ node node-me.js
$ node superagent-me.js
$ python python-me.py
$ python requests-me.py
```

Both the Python scripts should work with Python 2 as well as Python 3. The PHP examples are tested with PHP 7.1, but 
should also work on earlier versions. The JavaScript examples are tested with with Node v8.9.3, but should also work on
earlier versions.