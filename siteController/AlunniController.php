<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class AlunniController
{
    function alunni(Request $request, Response $response, $args) 
    {
        $class = new Classe();   
        $response->getBody()->write($class->toString());
        return $response ->withHeader('Content-Type', 'application/json')->withStatus(200);
    }

    function selectAlunno(Request $request, Response $response, $args) 
    {
        $class = new Classe();
        
        $alunno = $class->find($args['nome']);
        if($alunno != null)
        {
            $response->getBody()->write($alunno->toString());
            return $response ->withHeader('Content-Type', 'application/json')->withStatus(200);
        }
        else
        {
            $response->getBody()->write("Alunno non presente");
            return $response ->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
    }
}