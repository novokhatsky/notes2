<?php
session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");
    $response->getBody()->write("<br>");

    $response->getBody()->write('val = ' . $_SERVER['REQUEST_URI']);

    $_SESSION['name'] = $name;

    return $response;
});

$app->get('/', function (Request $request, Response $response) {

    if (isset($_SESSION['name'])) {
        $response->getBody()->write("Hello again, " . $_SESSION['name']);
    } else {
        $response->getBody()->write("Hello");
    }

    return $response;
});

$app->get('/bye/{name}', '\Notes\Controllers\Hello:index');


$app->run();

