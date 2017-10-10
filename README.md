git clone http://github.com/kaka987/restapi-by-slim.git

cd restapi-by-slim

docker run -it --rm -v $(pwd):/app composer/composer config repo.packagist composer https://packagist.phpcomposer.com

docker run -it --rm -v $(pwd):/app composer/composer install

docker-compose up -d


# Front and rear separation
http://192.168.33.66:8888/index.html


# use php template
http://192.168.33.66:8888
