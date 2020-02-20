<?php

class clsVenta{
    private $total;
    private $cliente;
    private $empleado;
    
    public function __construct($total, $cliente, $empleado)
    {
        $this->total = $total;
        $this->cliente = $cliente;
        $this->empleado = $empleado;
    }

    public function gettotal()
    {
        return $this->total;
    }
    
    public function settotal($total)
    {
        $this->total = $total;
    }

    public function getcliente()
    {
        return $this->cliente;
    }
    
    public function setcliente($cliente)
    {
        $this->cliente = $cliente;
    }     

    public function getempleado()
    {
        return $this->empleado;
    }
    
    public function setempleado($empleado)
    {
        $this->empleado = $empleado;
    }
}