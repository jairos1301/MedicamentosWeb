<?php

class clsVenta
{
    private $total;
    private $cliente;
    private $empleado;
    private $arrInv;
    private $arrCant;

    public function __construct($total, $cliente, $empleado, $arrInv, $arrCant)
    {
        $this->total = $total;
        $this->cliente = $cliente;
        $this->empleado = $empleado;
        $this->arrInv = $arrInv;
        $this->arrCant = $arrCant;
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

    public function getarrinv()
    {
        return $this->arrInv;
    }

    public function setarrinv($arrInv)
    {
        $this->arrInv = $arrInv;
    }

    public function getarrcant()
    {
        return $this->arrCant;
    }

    public function setarrcant($arrCant)
    {
        $this->arrCant = $arrCant;
    }
}
