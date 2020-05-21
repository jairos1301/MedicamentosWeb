<?php

class clsProveedor{
    private $idProveedor;
    private $nombrePro;
    private $razonsocial;
    private $telefonoPro;
    private $correoPro;

    public function __construct($idProveedor, $nombrePro, $razonsocial, $telefonoPro, $correoPro)
    {
        $this->idProveedor = $idProveedor;
        $this->nombrePro = $nombrePro;
        $this->razonsocial = $razonsocial;
        $this->telefonoPro = $telefonoPro;
        $this->correoPro = $correoPro  ;
    }

    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
    
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    public function getNombrePro()
    {
        return $this->nombrePro;
    }
    
    public function setNombrePro($nombrePro)
    {
        $this->nombrePro = $nombrePro;
    }

    public function getRazonSocial()
    {
        return $this->razonsocial;
    }
    
    public function setRazonSocial($razonsocial)
    {
        $this->razonsocial = $razonsocial;
    }

    public function getTelefonoPro()
    {
        return $this->telefonoPro;
    }
    
    public function setTelefonoPro($telefonoPro)
    {
        $this->telefonoPro = $telefonoPro;
    }

    public function getCorreoPro()
    {
        return $this->correoPro;
    }
    
    public function setCorreoPro($correoPro)
    {
        $this->correoPro = $correoPro;
    }
}