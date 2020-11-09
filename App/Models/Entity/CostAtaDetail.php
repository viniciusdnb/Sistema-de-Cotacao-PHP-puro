<?php

    namespace App\Models\Entity;

    class CostAtaDetail
    {
        private $id;
        private $idAtaCost;
        private $prAtaCost;
        private $idClientAta;
        private $item               ;
        private $descCompProduct    ;
        private $idProduct          ;
        private $nameProduct        ;
        private $idUnd              ;
        private $nameUnd            ;
        private $quantity           ;
        private $idFactory          ;
        private $nameFactory        ;
        private $costUnity          ;
        private $costTaotal         ;
        private $p1                 ;
        private $p1Total            ;
        private $p2                 ;
        private $p2Total            ;
        private $p3                 ;
        private $p3Total            ;
        private $minimum            ;
        private $minimumTotal       ;
        //atributo $costAta responsavel por armazenar o obejeto entidade costAta "cabeçalho"
        private $costAta;

        private $status;

        function setStatus($status)
        {
            $this->status = $status;
        }

        function getStatus()
        {
            return $this->status;
        }

        /*function __construct()
        {
            $this->costAta = new CostAta();
        }*/

        function getCostAta()
        {
            return $this->costAta;
        }

        function getId() {
            return $this->id;
        }

        function getIdAtaCost() {
            return $this->idAtaCost;
        }

        function getPrAtaCost() {
            return $this->prAtaCost;
        }

        function getIdClientAta() {
            return $this->idClientAta;
        }

        function getItem() {
            return $this->item;
        }

        function getDescCompProduct() {
            return $this->descCompProduct;
        }

        function getIdProduct() {
            return $this->idProduct;
        }

        function getNameProduct() {
            return $this->nameProduct;
        }

        function getIdUnd() {
            return $this->idUnd;
        }

        function getNameUnd() {
            return $this->nameUnd;
        }

        function getQuantity() {
            return $this->quantity;
        }

        function getIdFactory() {
            return $this->idFactory;
        }

        function getNameFactory() {
            return $this->nameFactory;
        }

        function getCostUnity() {
            return $this->costUnity;
        }

        function getCostTaotal(){
            return $this->costTaotal;
        }

        function getP1() {
            return $this->p1;
        }

        function getP1Total() {
            return $this->p1Total;
        }

        function getP2() {
            return $this->p2;
        }

        function getP2Total() {
            return $this->p2Total;
        }

        function getP3() {
            return $this->p3;
        }

        function getP3Total() {
            return $this->p3Total;
        }

        function getMinimum() {
            return $this->minimum;
        }

        function getMinimumTotal() {
            return $this->minimumTotal;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setIdAtaCost($idAtaCost){
            $this->idAtaCost = $idAtaCost;
        }

        function setPrAtaCost($prAtaCost) {
            $this->prAtaCost = $prAtaCost;
        }

        function setIdClientAta($idClientAta) {
            $this->idClientAta = $idClientAta;
        }

        function setItem($item) {
            $this->item = $item;
        }

        function setDescCompProduct($descCompProduct) {
            $this->descCompProduct = $descCompProduct;
        }

        function setIdProduct($idProduct) {
            $this->idProduct = $idProduct;
        }

        function setNameProduct($nameProduct) {
            $this->nameProduct = $nameProduct;
        }

        function setIdUnd($idUnd) {
            $this->idUnd = $idUnd;
        }

        function setNameUnd($nameUnd) {
            $this->nameUnd = $nameUnd;
        }

        function setQuantity($quantity) {
            $this->quantity = $quantity;
        }

        function setIdFactory($idFactory) {
            $this->idFactory = $idFactory;
        }

        function setNameFactory($nameFactory) {
            $this->nameFactory = $nameFactory;
        }

        function setCostUnity($costUnity) {
            $this->costUnity = $costUnity;
        }

        function setCostTaotal($costTaotal) {
            $this->costTaotal = $costTaotal;
        }

        function setP1($p1) {
            $this->p1 = $p1;
        }

        function setP1Total($p1Total) {
            $this->p1Total = $p1Total;
        }

        function setP2($p2) {
            $this->p2 = $p2;
        }

        function setP2Total($p2Total) {
            $this->p2Total = $p2Total;
        }

        function setP3($p3) {
            $this->p3 = $p3;
        }

        function setP3Total($p3Total) {
            $this->p3Total = $p3Total;
        }

        function setMinimum($minimum) {
            $this->minimum = $minimum;
        }

        function setMinimumTotal($minimumTotal) {
            $this->minimumTotal = $minimumTotal;
        }


}
