<?php

class clsEmpleado{
    private $idEmpleado;
    private $cedula;
    private $nombres;
    private $apellidos;
    private $correo;
    private $usuario;
    private $password;
    private $idTipoUsuario;

    public function __construct($idEmpleado, $cedula, $nombres, $apellidos, $correo, $usuario, $password, $idTipoUsuario)
    {
        $this->idEmpleado = $idEmpleado;
        $this->cedula = $cedula;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->correo = $correo  ;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->idTipoUsuario = $idTipoUsuario;
    }

    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }
    
    public function setIdEmpleado($IdEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
    }

    public function getCedula()
    {
        return $this->cedula;
    }
    
    public function setCedula($Cedula)
    {
        $this->cedula = $cedula;
    }

    public function getNombres()
    {
        return $this->nombres;
    }
    
    public function setNombres($Nombres)
    {
        $this->nombres = $nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
    
    public function setApellidos($Apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }
    
    public function setCorreo($Correo)
    {
        $this->correo = $correo;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }
    
    public function setIdTipoUsuario($idTipoUsuario)
    {
        $this->idTipoUsuario = $idTipoUsuario;
    }
}