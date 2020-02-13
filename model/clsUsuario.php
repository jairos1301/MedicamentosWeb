<?php

class clsUsuario
{
    private $idUsuario;
    private $cedula;
    private $nombres;
    private $apellidos;
    private $edad;
    private $genero;
    private $correo;
    private $nickname;
    private $password;
    private $idFincaU;
 

    public function __construct($idUsuario, $cedula, $nombres, $apellidos, $edad, $genero, $correo, $nickname, $password, $idFincaU)
    {
        $this->idUsuario = $idUsuario;
        $this->cedula = $cedula;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->genero = $genero;
        $this->correo = $correo;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->idFincaU = $idFincaU;
    }

    public function getIdFinca()
    {
        return $this->idUsuario;
    }
    public function getCedula()
    {
        return $this->cedula;
    }
    public function getNombres()
    {
        return $this->nombres;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getNickname()
    {
        return $this->nickname;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getIdFincaU()
    {
        return $this->idFincaU;
    }

// Setter
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setIdFincaU($idFincaU)
    {
        $this->idFincaU = $idFincaU;
    }
}
