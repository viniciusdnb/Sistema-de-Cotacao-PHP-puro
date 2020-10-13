<?php

    namespace App\Models\Entity;

    class Permission
    {
        private $id;
        private $type;
        private $typeName;
        private $perm;
        private $permName;

        public function setId( $id)
        {
            $this->id = $id;
        }

        public function setType( $type)
        {
            $this->type = $type;
        }

        public function setTypeName( $typeName)
        {
            $this->typeName = $typeName;
        }

        public function setPerm( $perm)
        {
            $this->perm = $perm;
        }

        public function setPermName( $permName)
        {
            $this->permName = $permName;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getType()
        {
            return $this->type;
        }
        public function getTypeName()
        {
            return $this->typeName;
        }

        public function getPerm()
        {
            return $this->perm;
        }

        public function getPermName()
        {
            return $this->permName;
        }
    }
