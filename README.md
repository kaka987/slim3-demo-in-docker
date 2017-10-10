git clone http://github.com/kaka987/slim3-demo-in-docker.git

cd slim3-demo-in-docker

docker run -it --rm -v $(pwd):/app composer/composer config repo.packagist composer https://packagist.phpcomposer.com

docker run -it --rm -v $(pwd):/app composer/composer install

docker-compose up -d


# Front and rear separation
http://your-ip:8888/index.html


# use php template
http://your-ip:8888
