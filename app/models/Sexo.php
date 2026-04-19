<?php

class Sexo
{
    private $idSexo;
    private $descripcion;

    public function __construct($idSexo = null, $descripcion = "")
    {
        $this->idSexo = $idSexo;
        $this->descripcion = $descripcion;
    }

    public function getIdSexo()
    {
        return $this->idSexo;
    }

    public function setIdSexo($idSexo)
    {
        $this->idSexo = $idSexo;
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