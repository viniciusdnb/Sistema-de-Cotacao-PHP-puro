<?php

    namespace App\Models\Entity;

    use DateTime;
  
    class CostAta
    {
        private $id;
        private $idClient;
        private $nameClient;
        private $date;
        private $pr;
        private $process;
        private $object;
        private $inDay;
        private $winner;
        private $daysDeliver;
        private $example;
        private $bula;
        private $catalog;
        private $cbpf;
        private $accreditation;
        private $registerAnvisa;
        private $registerDou;
        private $idAgent;
        private $nameAgent;

        
      
        
        function getId() {
        return $this->id;
        }

        function getIdClient() {
        return $this->idClient;
        }

        function getNameClient(){
            return $this->nameClient;
        }

        function setNameClient($nameClient){
            $this->nameClient = $nameClient;
        }

        function getDate() {
        return new DateTime($this->date);
        }

        function getPr() {
        return $this->pr;
        }

        function getProcess() {
        return $this->process;
        }

        function getObject() {
        return $this->object;
        }

        function getInDay() {
        return $this->inDay;
        }

        function getWinner() {
        return $this->winner;
        }

        function getDaysDeliver() {
        return $this->daysDeliver;
        }

        function getExample() {
        return $this->example;
        }

        function getBula() {
        return $this->bula;
        }

        function getCatalog() {
        return $this->catalog;
        }

        function getCbpf() {
        return $this->cbpf;
        }

        function getAccreditation() {
        return $this->accreditation;
        }

        function getRegisterAnvisa() {
        return $this->registerAnvisa;
        }

        function getRegisterDou() {
        return $this->registerDou;
        }

        function getIdAgent() {
            return $this->idAgent;
        }

        function getNameAgent() {
            return $this->nameAgent;
        }

        function setId($id) {
        $this->id = $id;
        }

        function setIdClient($idClient) {
        $this->idClient = $idClient;
        }

        function setDate($date) {
        $this->date = $date;
        }

        function setPr($pr) {
        $this->pr = $pr;
        }

        function setProcess($process) {
        $this->process = $process;
        }

        function setObject($object) {
        $this->object = $object;
        }

        function setInDay($inDay) {
        $this->inDay = $inDay;
        }

        function setWinner($winner) {
        $this->winner = $winner;
        }

        function setDaysDeliver($daysDeliver) {
        $this->daysDeliver = $daysDeliver;
        }

        function setExample($example) {
        $this->example = $example;
        }

        function setBula($bula) {
        $this->bula = $bula;
        }

        function setCatalog($catalog) {
        $this->catalog = $catalog;
        }

        function setCbpf($cbpf) {
        $this->cbpf = $cbpf;
        }

        function setAccreditation($accreditation) {
        $this->accreditation = $accreditation;
        }

        function setRegisterAnvisa($registerAnvisa) {
        $this->registerAnvisa = $registerAnvisa;
        }

        function setRegisterDou($registerDou) {
        $this->registerDou = $registerDou;
        }

        function setIdAgent($idAgent){
            $this->idAgent = $idAgent;
        }

        function setNameAgent($nameAgent)
        {
            $this->nameAgent = $nameAgent;
            
        }
  }
