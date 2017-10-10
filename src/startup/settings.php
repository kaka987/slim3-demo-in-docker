<?php
date_default_timezone_set('Asia/Shanghai');
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../../storage/logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // database
        'db' => [
            'host' => '192.168.33.66',
            'user' => 'root',
            'pass' => '123456',
            'dbname' => 'demo',
        ],
    ],
];
