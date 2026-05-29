<p align="center">
    <h1 align="center">
        Website Banksampah Darling
    </h1>
</p>

## Requirements

- docker
- docker-compose
- Setup mysql container
- Setup phpmyadmin container
- Create database with name `db_bsdarling`

## Import database
open phpmyadmin and import `db_bsdarling.sql` into database `db_bsdarling`

## How to run container
### edit `.env`
```php
// ...

database.default.hostname = mysql_korospace # mysql container name
database.default.database = db_bsdarling
database.default.username = korospace
database.default.password = korospace
database.default.DBDriver = MySQLi
database.default.DBPrefix = 

// ...
```

### how to run
```php
docker-compose up -d
```

### how to stop
```php
// stop service
docker-compose stop

// stop service and remove container
docker-compose down

// rebuild
docker-compose up --build
```

## Other Command Cheatseet
### turn into bash
```php
docker-compose exec -i -t ci4-bsdarlingweb-container bash
```
