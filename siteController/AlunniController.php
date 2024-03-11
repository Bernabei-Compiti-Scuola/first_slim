<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class AlunniController
{
    function alunni(Request $request, Response $response, $args) 
    {
        $class = new Classe();   
        $response->getBody()->write($class->jsonSerialize());
        return $response ->withHeader('Content-Type', 'application/json')->withStatus(200);
    }

    function createAlunno(Request $request, Response $response, $args)
    {
        $body=$request->getBody()-> getContents();
        $parseBody=json_decode($body,true);

        $nome=$parseBody['nome'];
        $cognome=$parseBody['cognome']; 
        $eta=$parseBody['eta'];

        $alunno=new Alunno( $nome,$cognome,$eta);
        
        $response->getBody()->write($alunno->jsonSerialize());

        return $response ->withHeader('Content-Type', 'application/json')->withStatus(201);
    }

    function deleteAlunno(Request $request, Response $response, $args)
    {
        $class = new Classe();
        $body=$request->getBody()-> getContents();
        $parseBody=json_decode($body,true);

        $alunno = $class->find($args['nome']);
        if($alunno != null)
        {
            $class->deleteAlunno($args['nome']);
            return $response ->withHeader('Content-Type', 'application/json')->withStatus(200);
        }
        else
        {
            $response->getBody()->write("Alunno non presente");
            return $response ->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
    }

    function updateAlunno (Request $request, Response $response, $args)
    {
        $body=$request->getBody()-> getContents();
        $parseBody=json_decode($body,true);
        $class= new Classe();
        $alunno = $class->find($args['nome']);
        if($alunno != null)
        {
            $alunno->setNome($parseBody['nome']);
            $alunno->setCognome($parseBody['cognome']);
            $alunno->setEta($parseBody['eta']);
            $response->getBody()->write($alunno->jsonSerialize());
            return $response ->withHeader('Content-Type', 'application/json')->withStatus(200);
        }
        else
        {
            $response->getBody()->write("Alunno non presente");
            return $response ->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
    }

    function selectAlunno(Request $request, Response $response, $args) 
    {
        $class = new Classe();
        
        $alunno = $class->find($args['nome']);
        if($alunno != null)
        {
            $response->getBody()->write($alunno->jsonSerialize());
            return $response ->withHeader('Content-Type', 'application/json')->withStatus(200);
        }
        else
        {
            $response->getBody()->write("Alunno non presente");
            return $response ->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
    }
}