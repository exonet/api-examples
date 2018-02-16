# Install the Python Requests library:
# `pip install requests`

import requests
import json

endpoint = '/me'

try:
    response = requests.get(
        url="https://api.exonet.nl/" + endpoint.lstrip('/'),
        headers={
            "Authorization": "Bearer " + open('./api-token.txt', 'r').read().strip(),
            "Accept": "application/vnd.Exonet.v1+json",
        },
    )
    content = json.loads(response.content.decode('utf-8'))

    print("")
    print("Hello " + content['data']['attributes']['name'] + "!")
    print("")
    print("-" * 10 + "[ Full decoded response ]" + "-" * 10)
    print(json.dumps(content, indent=4))

except requests.exceptions.RequestException:
    print('HTTP Request failed')
