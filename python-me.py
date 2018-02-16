import json
try:
    from urllib.request import Request, urlopen  # Python 3
except ImportError:
    from urllib2 import Request, urlopen  # Python 2

endpoint = '/me'

try:
    request = Request('https://api.exonet.nl/' + endpoint.lstrip('/'))
    request.add_header("Authorization", "Bearer " + open('./api-token.txt', 'r').read().strip())
    request.add_header("Accept", "application/vnd.Exonet.v1+json")

    content = json.loads(urlopen(request).read().decode('utf-8'))

    print("")
    print("Hello " + content['data']['attributes']['name'] + "!")
    print("")
    print("-" * 10 + "[ Full decoded response ]" + "-" * 10)
    print(json.dumps(content, indent=4))
except:
    print('HTTP Request failed')
