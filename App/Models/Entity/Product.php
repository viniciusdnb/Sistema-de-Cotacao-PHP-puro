<?php

namespace App\Models\Entity;

class Product
{
  private $id;
  private $codProd;
  private $descProd;
  private $idUnd;
  private $descUnd;
  private $idFactory;
  private $nameFactory;
  private $activeProd;
  private $medciamentProd;
  private $controlledProd;
  private $descCompleteProd;
  
  function getId() {
    return $this->id;
  }

  function getCodProd() {
    return $this->codProd;
  }

  function getDescProd() {
    return $this->descProd;
  }

  function getIdUnd() {
    return $this->idUnd;
  }

  function getDescUnd() {
    return $this->descUnd;
  }

  function getIdFactory() {
    return $this->idFactory;
  }

  function getNameFactory() {
    return $this->nameFactory;
  }

  function getActiveProd() {
    return $this->activeProd;
  }

  function getMedciamentProd() {
    return $this->medciamentProd;
  }

  function getControlledProd() {
    return $this->controlledProd;
  }

  function getDescCompleteProd() {
    return $this->descCompleteProd;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setCodProd($codProd) {
    $this->codProd = $codProd;
  }

  function setDescProd($descProd) {
    $this->descProd = $descProd;
  }

  function setIdUnd($idUnd) {
    $this->idUnd = $idUnd;
  }

  function setDescUnd($descUnd) {
    $this->descUnd = $descUnd;
  }

  function setIdFactory($idFactory) {
    $this->idFactory = $idFactory;
  }

  function setNameFactory($nameFactory) {
    $this->nameFactory = $nameFactory;
  }

  function setActiveProd($activeProd) {
    $this->activeProd = $activeProd;
  }

  function setMedciamentProd($medciamentProd) {
    $this->medciamentProd = $medciamentProd;
  }

  function setControlledProd($controlledProd) {
    $this->controlledProd = $controlledProd;
  }

  function setDescCompleteProd($descCompleteProd) {
    $this->descCompleteProd = $descCompleteProd;
  }


}


?>