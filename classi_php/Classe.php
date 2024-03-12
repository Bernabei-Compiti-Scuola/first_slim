<?php
require_once './classi_php/Alunno.php';
class Classe implements JsonSerializable
{
    public function __construct()
    {
        $this->studenti = array();
        $this->studenti[] = new Alunno("Mario", "Rossi", 18);
        $this->studenti[] = new Alunno("Luca", "Bianchi", 19);
        $this->studenti[] = new Alunno("Paolo", "Verdi", 20);
        $this->studenti[] = new Alunno("Giovanni", "Neri", 21);
    }

    /**
     * Funzione per serializzare l'oggetto in formato JSON.
     * @return array L'array contenente gli alunni della classe.
     */
    public function jsonSerialize()
    {
        $a = [
            "alunni"=>$this->studenti
        ];
        return $a;
    }

    /**
     * Funzione per trovare un alunno nella classe dato il suo nome.
     * @param string $nome Il nome dell'alunno da cercare.
     * @return Alunno|null L'oggetto Alunno corrispondente al nome specificato, o null se non trovato.
     */
    public function find($nome)
    {
        foreach($this->studenti as $studente)
        {
            if($studente->getNome()==$nome)
            {
                return $studente;
            }
        }
        return null;
    }

    /**
     * Funzione per eliminare un alunno dalla classe dato il suo nome.
     * @param string $nome Il nome dell'alunno da eliminare.
     * @return Alunno|null L'oggetto Alunno eliminato, o null se non trovato.
     */
    function deleteAlunno($nome)
    {
        $alunno = $this->find($nome);
        if($alunno != null)
        {
            $key = array_search($alunno, $this->studenti);
            unset($this->studenti[$key]);
            return $alunno;
        }
        else
        {
            return null;
        }
    }

}