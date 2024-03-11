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

    public function jsonSerialize(){
        $a = [
            "alunni"=>$this->studenti
        ];
        return $a;
    }

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