<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once 'Classe.php';

$app = AppFactory::create();
$class = new Classe();
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->get('/alunni', function (Request $request, Response $response, $args) {
    $reùsponse->getBody()->write($class->toString());
    return $response;
});

$app->run();
