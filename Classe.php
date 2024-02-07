<?php
require_once 'Alunno.php';
    class Classe
    {
        public function __construct()
        {
            $this->studenti = array();
            $this->studenti[0] = new Alunno("Mario", "Rossi", 18);
            $this->studenti[1] = new Alunno("Luca", "Bianchi", 19);
            $this->studenti[2] = new Alunno("Paolo", "Verdi", 20);
            $this->studenti[3] = new Alunno("Giovanni", "Neri", 21);
        }

        public function  toString()
        {
            echo "studenti: ". $this->studenti."<p>";
        }

    }