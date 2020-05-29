<?php

class clsCliente{

    private $idCliente;
    private $nombres;
    private $apellidos;
    private $cedula;
    private $genero;
    private $edad;
    
    
    public function __construct($idCliente, $nombres, $apellidos, $cedula, $genero, $edad)
    {
        $this->idCliente = $idCliente;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->cedula = $cedula;
        $this->genero = $genero;
        $this->edad = $edad;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }
    
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }
    
    public function getNombres()
    {
        return $this->nombres;
    }
    
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
    
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }     

    public function getCedula()
    {
        return $this->cedula;
    }
    
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    
    public function getGenero()
    {
        return $this->genero;
    }
    
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function getEdad()
    {
        return $this->edad;
    }
    
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
}