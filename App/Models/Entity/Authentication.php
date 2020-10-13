<?php

    namespace App\Models\Entity;

    class Authentication
    {
        private $id;
        private $name;
        private $pass;
        private $perm;

        public function setPerm($perm)
        {
            $this->perm = $perm;
        }

        public function getPerm()
        {
            return $this->perm;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getPass()
        {
            return $this->pass;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function setPass($pass)
        {
            $this->pass = $pass;
        }
    }
