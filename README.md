# Fine Tuning PHP

> Repository contains only example codes and nothing is production ready!

## Installation
```console
# install composer with classmap optimization
$ cd var/www/html
$ composer install -o

$ cd  ../../..
$ docker-compose up -d
```

## Usage
- remove comments one-by-one from `usr/local/etc/php/conf.d/opcache-fine-tune.ini`
- run `docker-compose restart php-fpm` for each change
- observe speed difference between each change and between first request and subsequent requests


## License
MIT
