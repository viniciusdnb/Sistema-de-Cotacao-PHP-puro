<?php

    namespace App\Models\Entity;

    class Agent
    {
        private $id;
        private $nameAgent;
        private $emailAgente;
        private $phoneAgente;

        public function setId($id)
        {
            $this->id = $id;
        }
        public function setNameAgent($nameAgent)
        {
            $this->nameAgent = $nameAgent;
        }
        public function setEmailAgente($emailAgente)
        {
            $this->emailAgente = $emailAgente;
        }
        public function setPhoneAgente($phoneAgente)
        {
            $this->phoneAgente = $phoneAgente;
        }
        public function getId()
        {
            return $this->id;
        }
         public function getNameAgent()
        {
            return $this->nameAgent;
        }
         public function getEmailAgente()
        {
            return $this->emailAgente;
        }
         public function getPhoneAgente()
        {
            return $this->phoneAgente;
        }
    }

?>