<?php

class clsEstanteria{
    private $idEstanteria;
    private $nombre;
    private $descripcio;
   
    public function __construct($idEstanteria, $nombre, $descripcion)
    {
        $this->idEstanteria = $idEstanteria;
        $this->nombre = $nombre;
        $this->descripcion= $descripcion;
    }

    public function getIdEstanteria()
    {
        return $this->idEstanteria;
    }
    
    public function setIdEstanteria($idEstanteria)
    {
        $this->idEstanteria = $idEstanteria;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }     

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}