<?php

    namespace App\Models\Entity;

    class User
    {
        private $id;
        private $name;
        private $pass;
        private $active;
        private $idPerm;
        private $typePerm;
        private $typeNamePerm;
        private $perm;
        private $permName;
        private $email;
        private $idFactory;

        public function setIdFactory($idFactory)
        {
            $this->idFactory = $idFactory;
        }

        public function getIdFactory()
        {
            return $this->idFactory;
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

        public function setActive($active)
        {
            $this->active = $active;
        }

        public function setIdPerm( $idPerm)
        {
            $this->idPerm = $idPerm;
        }

        public function setTypePerm($typePerm)
        {
            $this->typePerm = $typePerm;
        }

        public function setTypeNamePerm($typeNamePerm)
        {
            $this->typeNamePerm = $typeNamePerm;
        }

       
        public function setPerm($perm)
        {
            $this->perm = $perm;
        }

        public function setPermName($permName)
        {
            $this->permName = $permName;
        }

        public function setEmail($email)
        {
            $this->email = $email;
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

        public function getActive()
        {
            return $this->active;
        }

        public function getIdPerm()
        {
            return $this->idPerm;
        }

        public function getTypePerm()
        {
            return $this->typePerm;
        }

        public function getTypeNamePerm()
        {
            return $this->typeNamePerm;
        }

        public function getPerm()
        {
            return $this->perm;
        }

        public function getPermName()
        {
            return $this->permName;
        }

        public function getEmail()
        {
            return $this->email;
        }
    }
