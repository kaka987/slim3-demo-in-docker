<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $data = $this->userApp->getUsers();

    // Render index view
    return $this->renderer->render($response, 'index.phtml', ['data'=>$data]);
});

$app->post('/app/users/v1', function (Request $request, Response $response, array $args) {
    $result = $this->userApp->addUser($request->getParsedBody());
    $data['status'] = 500;
    $data['msg'] = 'error';
    $data['data'] = [];
    if ($result) {
        $data['status'] = 200;
        $data['msg'] = 'ok';
        $data['data'] = [];
    }
    return $response->withJson($data);
});

$app->put('/user/[{id}]', function (Request $request, Response $response, array $args) {
    var_dump($args);
    var_dump($request->getParsedBody());
});
