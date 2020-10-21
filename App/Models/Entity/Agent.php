<?php

    namespace App\Models\Entity;

    class Agent
    {
        private $id;
        private $nameAgent;
        private $emailAgent;
        private $phoneAgent;

        public function setId($id)
        {
            $this->id = $id;
        }
        public function setNameAgent($nameAgent)
        {
            $this->nameAgent = $nameAgent;
        }
        public function setEmailAgent($emailAgent)
        {
            $this->emailAgent = $emailAgent;
        }
        public function setPhoneAgent($phoneAgent)
        {
            $this->phoneAgent = $phoneAgent;
        }
        public function getId()
        {
            return $this->id;
        }
         public function getNameAgent()
        {
            return $this->nameAgent;
        }
         public function getEmailAgent()
        {
            return $this->emailAgent;
        }
         public function getPhoneAgent()
        {
            return $this->phoneAgent;
        }
    }

?>