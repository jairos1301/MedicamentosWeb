<?php

class clsInventario
{
    private $idInventario;
    private $nombre;
    private $descripcion;
    private $fechaVencimiento;
    private $cantidad;
    private $fechaFabricacion;
    private $precio;
    private $idEmpFk;
    private $idLabFk;
 

    public function __construct($idInventario, $nombre, $descripcion, $fechaVencimiento, $cantidad, $fechaFabricacion, $precio, $idEmpFk, $idLabFk)
    {
        $this->idInventario = $idInventario;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->cantidad = $cantidad;
        $this->fechaFabricacion = $fechaFabricacion;
        $this->precio = $precio;
        $this->idEmpFk = $idEmpFk;
        $this->idLabFk = $idLabFk;
    }

    public function getIdInventario()
    {
        return $this->idInventario;
    }
    
    public function setIdInventario($IdInventario)
    {
        $this->idInventario = $idInventario;
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

    public function getFechaVencimiento()
    {
        return $this->cantidad;
    }
    
    public function setFechaVencimiento($FechaVencimiento)
    {
        $this->cantidad = $cantidad;
    }
    
    public function getCantidad()
    {
        return $this->cantidad;
    }
    
    public function setCantidad($Cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getFechaFabricacion()
    {
        return $this->fechaFabricacion;
    }
    
    public function setFechaFabricacion($FechaFabricacion)
    {
        $this->fechaFabricacion = $fechaFabricacion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    
    public function setPrecio($Precio)
    {
        $this->precio = $precio;
    }

    public function getIdEmpFk()
    {
        return $this->idEmpFk;
    }
    
    public function setIdEmpFk($IdEmpFk)
    {
        $this->idEmpFk = $idEmpFk;
    }

    public function getIdLabFk()
    {
        return $this->idLabFk;
    }
    
    public function setIdLabFk($IdLabFk)
    {
        $this->idLabFk = $idLabFk;
    }

}