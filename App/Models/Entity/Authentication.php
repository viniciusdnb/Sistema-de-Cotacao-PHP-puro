<?php

    namespace App\Models\Entity;

    class Authentication
    {
        private $id;
        private $name;
        private $pass;
        private $id_perm;
        private $id_factory;

        public function setIdFactory($id_factory)
        {
            $this->id_factory = $id_factory;
        }

        public function getIdFactory()
        {
            return $this->id_factory;
        }        


        public function setPerm($id_perm)
        {
            $this->id_perm = $id_perm;
        }

        public function getPerm()
        {
            return $this->id_perm;
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
