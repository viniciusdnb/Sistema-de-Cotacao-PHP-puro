<?php

    namespace App\Models\Entity;

    class Und 
    {
        private $id;
        private $description;
        private $und;

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setDescription($description)
        {
            $this->description = $description;
        }

        public function setUnd($und)
        {
            $this->und = $und;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function getUnd()
        {
            return $this->und;
        }
        

    }

?>
