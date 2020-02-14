<?php

class clsLaboratorio{
    private $idLaboratorio;
    private $nombre;
    private $descripcion;
   
    public function __construct($idLaboratorio, $nombre, $descripcion)
    {
        $this->idLaboratorio = $idLaboratorio;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function getIdLaboratorio()
    {
        return $this->idLaboratorio;
    }
    
    public function setIdLaboratorio($IdLaboratorio)
    {
        $this->idLaboratorio = $idLaboratorio;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function setNombre($Nombre)
    {
        $this->nombre = $nombre;
    }     

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    public function setDescripcion($Descripcion)
    {
        $this->descripcion = $descripcion;
    }
}