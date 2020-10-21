<?php

    namespace App\Models\Entity;

    class Client
    {
        private $id;
        private $nameClient;
        private $addresClient;
        private $emailClient;
        private $cnpjClient;
        private $phoneClient;
        private $contactClient;
        private $idAgent;
        private $nameAgent;

        function getPhoneClient()
        {
            return $this->phoneClient;
        }

        function setPhoneClient($phoneClient)
        {
            $this->phoneClient = $phoneClient;
        }
        function getNameAgent()
        {
            return $this->nameAgent;
        }

        function setNAmeAgent($nameAgent)
        {
            $this->nameAgent = $nameAgent;
        }
        
        function getId() {
        return $this->id;
        }

        function getNameClient() {
        return $this->nameClient;
        }

        function getAddresClient() {
        return $this->addresClient;
        }

        function getEmailClient() {
        return $this->emailClient;
        }

        function getCnpjClient() {
        return $this->cnpjClient;
        }

        function getContactClient() {
        return $this->contactClient;
        }

        function getIdAgent() {
        return $this->idAgent;
        }

        function setId($id) {
        $this->id = $id;
        }

        function setNameClient($nameClient) {
        $this->nameClient = $nameClient;
        }

        function setAddresClient($addresClient) {
        $this->addresClient = $addresClient;
        }

        function setEmailClient($emailClient) {
        $this->emailClient = $emailClient;
        }

        function setCnpjClient($cnpjClient) {
        $this->cnpjClient = $cnpjClient;
        }

        function setContactClient($contactClient) {
        $this->contactClient = $contactClient;
        }

        function setIdAgent($idAgent) {
        $this->idAgent = $idAgent;
        }


  }
