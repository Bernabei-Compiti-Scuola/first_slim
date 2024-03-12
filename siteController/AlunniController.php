<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AlunniController
{
    /**
     * Funzione alunni
     * Questa funzione gestisce la richiesta di ottenere tutti gli alunni.
     * Restituisce una risposta JSON contenente tutti gli alunni presenti.
     */
    function alunni(Request $request, Response $response, $args) 
    {
        $class = new Classe();   
        $response->getBody()->write($class->jsonSerialize());
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }

    /**
     * Funzione createAlunno
     * Questa funzione gestisce la richiesta di creazione di un nuovo alunno.
     * Riceve i dati dell'alunno tramite una richiesta JSON e crea un nuovo oggetto Alunno.
     * Restituisce una risposta JSON contenente l'alunno creato.
     */
    function createAlunno(Request $request, Response $response, $args)
    {
        $body = $request->getBody()->getContents();
        $parseBody = json_decode($body, true);

        $nome = $parseBody['nome'];
        $cognome = $parseBody['cognome']; 
        $eta = $parseBody['eta'];

        $alunno = new Alunno($nome, $cognome, $eta);
        
        $response->getBody()->write($alunno->jsonSerialize());

        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }

    /**
     * Funzione deleteAlunno
     * Questa funzione gestisce la richiesta di eliminazione di un alunno.
     * Riceve il nome dell'alunno da eliminare tramite i parametri della richiesta.
     * Se l'alunno esiste, viene eliminato e restituisce una risposta JSON con stato 200.
     * Se l'alunno non esiste, restituisce una risposta JSON con stato 404.
     */
    function deleteAlunno(Request $request, Response $response, $args)
    {
        $class = new Classe();
        $body = $request->getBody()->getContents();
        $parseBody = json_decode($body, true);

        $alunno = $class->find($args['nome']);
        if ($alunno != null) 
        {
            $class->deleteAlunno($args['nome']);
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        } 
        else 
        {
            $response->getBody()->write("Alunno non presente");
            return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
    }

    /**
     * Funzione updateAlunno
     * Questa funzione gestisce la richiesta di aggiornamento di un alunno.
     * Riceve il nome dell'alunno da aggiornare tramite i parametri della richiesta.
     * Riceve i nuovi dati dell'alunno tramite una richiesta JSON e aggiorna l'oggetto Alunno corrispondente.
     * Restituisce una risposta JSON contenente l'alunno aggiornato.
     * Se l'alunno non esiste, restituisce una risposta JSON con stato 404.
     */
    function updateAlunno(Request $request, Response $response, $args)
    {
        $body = $request->getBody()->getContents();
        $parseBody = json_decode($body, true);
        $class = new Classe();
        $alunno = $class->find($args['nome']);
        if ($alunno != null) 
        {
            $alunno->setNome($parseBody['nome']);
            $alunno->setCognome($parseBody['cognome']);
            $alunno->setEta($parseBody['eta']);
            $response->getBody()->write($alunno->jsonSerialize());
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        } 
        else 
        {
            $response->getBody()->write("Alunno non presente");
            return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
    }

    /**
     * Funzione selectAlunno
     * Questa funzione gestisce la richiesta di ottenere un singolo alunno.
     * Riceve il nome dell'alunno da ottenere tramite i parametri della richiesta.
     * Restituisce una risposta JSON contenente l'alunno richiesto.
     * Se l'alunno non esiste, restituisce una risposta JSON con stato 404.
     */
    function selectAlunno(Request $request, Response $response, $args) 
    {
        $class = new Classe();
        
        $alunno = $class->find($args['nome']);
        if ($alunno != null) 
        {
            $response->getBody()->write($alunno->jsonSerialize());
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        } 
        else 
        {
            $response->getBody()->write("Alunno non presente");
            return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
    }
}