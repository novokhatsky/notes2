<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

$app->add(
    new \Slim\Middleware\Session([
        'autorefresh' => true,
        'lifetime' => '1 hour',
    ])
);

$container = $app->getContainer();

$container['session'] = function($c) {
    $session = new \SlimSession\Helper();

    return $session;
};


$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');

    $response->getBody()->write("Hello, $name");
    
    $response->getBody()->write('<br>val = ' . $_SERVER['REQUEST_URI']);

    $this->session->t6 = $name;

    return $response;
});

$app->get('/', function (Request $request, Response $response) {

    $response->getBody()->write("Hello");

    return $response;
});

$app->get('/bye/{name}', '\Notes\Controllers\Hello:index');


$app->run();

