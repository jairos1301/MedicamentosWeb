<?php

class clsCliente{
    private $nombres;
    private $apellidos;
    private $cedula;
    private $genero;
    private $edad;
    
    
    public function __construct($nombres, $apellidos, $cedula, $genero, $edad)
    {
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->cedula = $cedula;
        $this->genero = $genero;
        $this->edad = $edad;
    }

    public function getnombres()
    {
        return $this->nombres;
    }
    
    public function setnombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function getapellidos()
    {
        return $this->apellidos;
    }
    
    public function setapellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }     

    public function getcedula()
    {
        return $this->cedula;
    }
    
    public function setcedula($cedula)
    {
        $this->cedula = $cedula;
    }
    
    public function getgenero()
    {
        return $this->genero;
    }
    
    public function setgenero($genero)
    {
        $this->genero = $genero;
    }

    public function getedad()
    {
        return $this->edad;
    }
    
    public function setedad($edad)
    {
        $this->edad = $edad;
    }
}