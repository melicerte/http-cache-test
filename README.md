# http-cache-test

Start containers
```
docker-compose up -d
```

Connect to container apache
```
docker-compose exec --user=www-data apache bash
```

Install packages (in docker)
```
composer install
```

Add data in database.

[Enjoy](http://localhost:6700/cachedentity/list)