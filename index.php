<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once 'Classe.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->get('/alunni', function (Request $request, Response $response, $args) 
{
    $class = new Classe();   
    $response->getBody()->write($class->toString());
    return $response;
});

$app->get('/alunni/{nome}', function (Request $request, Response $response, $args) 
{
    $class = new Classe();
    
    $alunno = $class->find($args['nome']);
    if($alunno != null)
    {
        $response->getBody()->write($alunno->toString());
    }
    else
    {
        $response->getBody()->write("Alunno non presente");
    }
    return $response;
});

$app->run();
