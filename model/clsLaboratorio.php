<?php

class clsLaboratorio{
    private $idLaboratorio;
    private $nombreLab;
    private $descripcionLab;
   
    public function __construct($idLaboratorio, $nombreLab, $descripcionLab)
    {
        $this->idLaboratorio = $idLaboratorio;
        $this->nombreLab = $nombreLab;
        $this->descripcionLab = $descripcionLab;
    }

    public function getIdLaboratorio()
    {
        return $this->idLaboratorio;
    }
    
    public function setIdLaboratorio($IdLaboratorio)
    {
        $this->idLaboratorio = $idLaboratorio;
    }

    public function getNombreLab()
    {
        return $this->nombreLab;
    }
    
    public function setNombre($nombreLab)
    {
        $this->nombreLab = $nombreLab;
    }     

    public function getDescripcionLab()
    {
        return $this->descripcionLab;
    }
    
    public function setDescripcionLab($descripcionLab)
    {
        $this->descripcionLab = $descripcionLab;
    }
}