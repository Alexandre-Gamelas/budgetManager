<?php

class Categoria
{
    private $id;
    private $name;
    private $icon;
    private $color;

    private $percentage;
    private $total = 0;
    private $count = 0;

    private $max;
    private $percentBudget;

    private $purchases = array();


    public function __construct($id, $name, $icon, $color)
    {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->color = $color;
    }

    public function getId(){
        return $this->id;
    }

    public function setPurchases($purchases){
        $this->purchases = $purchases;
        foreach ($purchases as $purchase){
            $this->count++;
            $this->total += $purchase->getValor();
        }
    }

    public function getPurchases(){
        return $this->purchases;
    }

    public function getTotal(){
        return $this->total;
    }

    public function getPercentage()
    {
        return $this->percentage;
    }

    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getIcon()
    {
        return $this->icon;
    }
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getCount()
    {
        return $this->count;
    }
    
    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getMax()
    {
        return $this->max;
    }

    public function setMax($max)
    {
        $this->max = $max;
    }
    
    public function getPercentBudget()
    {
        return $this->percentBudget;
    }

    public function setPercentBudget($percentBudget)
    {
        $this->percentBudget = $percentBudget;
    }
}