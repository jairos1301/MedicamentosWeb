<?php

class clsTipoUsuario{
    private $idTipoUsuario;
    private $nombreTipo;

    public function __construct($idTipoUsuario, $nombreTipo)
    {
        $this->idTipoUsuario = $idTipoUsuario;
        $this->nombreTipo = $nombreTipo;
    }

    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }
    
    public function setIdTipoUsuario($idTipoUsuario)
    {
        $this->idTipoUsuario = $idTipoUsuario;
    }

    public function getNombreTipo()
    {
        return $this->nombreTipo;
    }
    
    public function setNombreTipo($nombreTipo)
    {
        $this->nombreTipo = $nombreTipo;
    }
}