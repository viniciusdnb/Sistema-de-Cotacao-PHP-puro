<?php

    namespace App\Models\Entity;

    class CostAtaDetail
    {
        private $id;
        private $idAtaCost;
        private $prAtaCost;
        private $idClientAta;
        private $item               = [];
        private $descCompProduct    = [];
        private $idProduct          = [];
        private $nameProduct        = [];
        private $idUnd              = [];
        private $nameUnd            = [];
        private $quantity           = [];
        private $idFactory          = [];
        private $nameFactory        = [];
        private $costUnity          = [];
        private $costTaotal         = [];
        private $p1                 = [];
        private $p1Total            = [];
        private $p2                 = [];
        private $p2Total            = [];
        private $p3                 = [];
        private $p3Total            = [];
        private $minimum            = [];
        private $minimumTotal       = [];
        //atributo $costAta responsavel por armazenar o obejeto entidade costAta "cabeçalho"
        private $costAta;

        function __construct()
        {
            $this->costAta = new CostAta();
        }

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

        function getItem(): array {
            return $this->item;
        }

        function getDescCompProduct(): array {
            return $this->descCompProduct;
        }

        function getIdProduct(): array {
            return $this->idProduct;
        }

        function getNameProduct(): array {
            return $this->nameProduct;
        }

        function getIdUnd(): array {
            return $this->idUnd;
        }

        function getNameUnd(): array {
            return $this->nameUnd;
        }

        function getQuantity(): array {
            return $this->quantity;
        }

        function getIdFactory(): array {
            return $this->idFactory;
        }

        function getNameFactory(): array {
            return $this->nameFactory;
        }

        function getCostUnity(): array {
            return $this->costUnity;
        }

        function getCostTaotal(): array{
            return $this->costTaotal;
        }

        function getP1(): array {
            return $this->p1;
        }

        function getP1Total(): array {
            return $this->p1Total;
        }

        function getP2(): array {
            return $this->p2;
        }

        function getP2Total(): array {
            return $this->p2Total;
        }

        function getP3(): array {
            return $this->p3;
        }

        function getP3Total(): array {
            return $this->p3Total;
        }

        function getMinimum(): array {
            return $this->minimum;
        }

        function getMinimumTotal(): array {
            return $this->minimumTotal;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setIdAtaCost($idAtaCost) {
            $this->idAtaCost = $idAtaCost;
        }

        function setPrAtaCost($prAtaCost) {
            $this->prAtaCost = $prAtaCost;
        }

        function setIdClientAta($idClientAta) {
            $this->idClientAta = $idClientAta;
        }

        function setItem(array $item) {
            $this->item = $item;
        }

        function setDescCompProduct(array $descCompProduct) {
            $this->descCompProduct = $descCompProduct;
        }

        function setIdProduct(array $idProduct) {
            $this->idProduct = $idProduct;
        }

        function setNameProduct(array $nameProduct) {
            $this->nameProduct = $nameProduct;
        }

        function setIdUnd(array $idUnd) {
            $this->idUnd = $idUnd;
        }

        function setNameUnd(array $nameUnd) {
            $this->nameUnd = $nameUnd;
        }

        function setQuantity(array $quantity) {
            $this->quantity = $quantity;
        }

        function setIdFactory(array $idFactory) {
            $this->idFactory = $idFactory;
        }

        function setNameFactory(array $nameFactory) {
            $this->nameFactory = $nameFactory;
        }

        function setCostUnity(array $costUnity) {
            $this->costUnity = $costUnity;
        }

        function setCostTaotal(array $costTaotal) {
            $this->costTaotal = $costTaotal;
        }

        function setP1(array $p1) {
            $this->p1 = $p1;
        }

        function setP1Total(array $p1Total) {
            $this->p1Total = $p1Total;
        }

        function setP2(array $p2) {
            $this->p2 = $p2;
        }

        function setP2Total(array $p2Total) {
            $this->p2Total = $p2Total;
        }

        function setP3(array $p3) {
            $this->p3 = $p3;
        }

        function setP3Total(array $p3Total) {
            $this->p3Total = $p3Total;
        }

        function setMinimum(array $minimum) {
            $this->minimum = $minimum;
        }

        function setMinimumTotal(array $minimumTotal) {
            $this->minimumTotal = $minimumTotal;
        }


}
