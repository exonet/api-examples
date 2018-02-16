curl "https://api.exonet.nl/me" \
     -H "Authorization: Bearer $(head -n 1 api-token.txt)" \
     -H 'Accept: application/vnd.Exonet.v1+json'