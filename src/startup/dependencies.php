<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['userApp'] = function ($c) {
    $settings = $c->get('settings');
    return new App\Users\UserApp($settings);
};

$container['db'] = function () {
    return new \App\Libs\MysqlPdo();
};

App\Libs\Config::setInstance('container', $container);
App\Libs\Config::setSettings('settings', $settings['settings']);
