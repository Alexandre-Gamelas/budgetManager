<?php

class Purchase
{
    private $id;
    private $name;
    private $valor;
    private $categoria;
    private $date;

    public function __construct($id, $name, $valor, $date, $categoria)
    {
        $this->id = $id;
        $this->name = $name;
        $this->valor = $valor;
        $this->date = $date;
        $this->categoria = $categoria;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getValor()
    {
        return (double) $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }


}