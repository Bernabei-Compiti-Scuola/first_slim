<?php
    class Alunno
    {
        private $nome;
        private $cognome;
        private $eta;

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