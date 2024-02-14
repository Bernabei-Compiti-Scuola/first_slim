<?php
    class Alunno
    {
        protected  $nome;
        protected  $cognome;
        protected  $eta;

        public function  toString()
        {
            return "nome: ". $this->nome.", cognome: ". $this->cognome. ",eta: " .$this->eta;
        }

        public function Alunno($nome, $cognome, $eta)
        {
            $this->nome = $nome;
            $this->cognome = $cognome;
            $this->eta = $eta;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getCognome()
        {
            return $this->cognome;
        }

        public function setCognome($cognome)
        {
            $this->cognome = $cognome;
        }

        public function getEta()
        {
            return $this->eta;
        }

        public function setEta($eta)
        {
            $this->eta = $eta;
        }
    }
?>