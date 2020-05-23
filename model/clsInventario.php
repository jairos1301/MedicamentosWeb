<?php

class clsInventario
{
    private $idInventario;
    private $nombreInv;
    private $descripcionInv;
    private $fechaVen;
    private $cantidad;
    private $fechaFab;
    private $precio;
    private $Empleado_idEmpleado;
    private $Laboratorio_idLaboratorio;
    private $estanteria;
 

    public function __construct($idInventario, $nombreInv, $descripcionInv, $fechaVen, $cantidad, $fechaFab, $precio, $Empleado_idEmpleado, $Laboratorio_idLaboratorio, $estanteria)
    {
        $this->idInventario = $idInventario;
        $this->nombreInv = $nombreInv;
        $this->descripcionInv = $descripcionInv;
        $this->fechaVen = $fechaVen;
        $this->cantidad = $cantidad;
        $this->fechaFab = $fechaFab;
        $this->precio = $precio;
        $this->idEmpFk = $Empleado_idEmpleado;
        $this->idLabFk = $Laboratorio_idLaboratorio;
        $this->estanteria = $estanteria;
    }

    public function getEstanteria()
    {
        return $this->estanteria;
    }
    
    public function setEstanteria($idEstanteria)
    {
        $this->idEstanteria = $idEstanteria;
    }

    public function getIdInventario()
    {
        return $this->idInventario;
    }
    
    public function setIdInventario($idInventario)
    {
        $this->idInventario = $idInventario;
    }

    public function getNombreInv()
    {
        return $this->nombreInv;
    }
    
    public function setNombreInv($nombreInv)
    {
        $this->nombreInv = $nombreInv;
    }

    public function getDescripcionInv()
    {
        return $this->descripcionInv;
    }
    
    public function setDescripcionInv($descripcionInv)
    {
        $this->descripcionInv = $descripcionInv;
    }

    public function getFechaVen()
    {
        return $this->fechaVen;
    }
    
    public function setFechaVen($fechaVen)
    {
        $this->fechaVen = $fechaVen;
    }
    
    public function getCantidad()
    {
        return $this->cantidad;
    }
    
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getFechaFab()
    {
        return $this->fechaFab;
    }
    
    public function setFechaFab($fechaFab)
    {
        $this->fechaFab = $fechaFab;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getEmpleado_idEmpleado()
    {
        return $this->idEmpFk;
    }
    
    public function setEmpleado_idEmpleado($Empleado_idEmpleado)
    {
        $this->idEmpFk = $Empleado_idEmpleado;
    }

    public function getLaboratorio_idLaboratorio()
    {
        return $this->idLabFk;
    }
    
    public function setLaboratorio_idLaboratorio($Laboratorio_idLaboratorio)
    {
        $this->idLabFk = $Laboratorio_idLaboratorio;
    }

}