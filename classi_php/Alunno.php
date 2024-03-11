<?php
    class Alunno implements JsonSerializable
    {
        protected $nome;
        protected $cognome;
        protected $eta;

        public function Alunno($nome, $cognome, $eta)
        {
            $this->nome = $nome;
            $this->cognome = $cognome;
            $this->eta = $eta;
        }
        public function toString()
        {
            return "Nome: " . $this->nome . ", cognome: " . $this->cognome . ", eta: " . $this->eta . ".<br>";
        }
        public function jsonSerialize()
        {
            $a = [
                "nome"=>$this->nome,
                "cognome"=>$this->cognome,
                "eta"=>$this->eta
            ];
            return $a;
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