<?php

    namespace App\Models\Entity;

    class Factory
    {
        private $id;
        private $nameFactory;
        private $addresFactory;
        private $emailFactory;
        private $cnpjFactory;
        private $phoneFactory;
        private $contactFactory;
        
        function getId() {
        return $this->id;
        }

        function getNameFactory() {
        return $this->nameFactory;
        }

        function getAddresFactory() {
        return $this->addresFactory;
        }

        function getEmailFactory() {
        return $this->emailFactory;
        }

        function getCnpjFactory() {
        return $this->cnpjFactory;
        }

        function getPhoneFactory() {
        return $this->phoneFactory;
        }

        function getContactFactory() {
        return $this->contactFactory;
        }

        function setId($id) {
        $this->id = $id;
        }

        function setNameFactory($nameFactory) {
        $this->nameFactory = $nameFactory;
        }

        function setAddresFactory($addresFactory) {
        $this->addresFactory = $addresFactory;
        }

        function setEmailFactory($emailFactory) {
        $this->emailFactory = $emailFactory;
        }

        function setCnpjFactory($cnpjFactory) {
        $this->cnpjFactory = $cnpjFactory;
        }

        function setPhoneFactory($phoneFactory) {
        $this->phoneFactory = $phoneFactory;
        }

        function setContactFactory($contactFactory) {
        $this->contactFactory = $contactFactory;
        }


  }
