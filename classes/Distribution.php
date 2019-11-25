<?php

class Distribution
{
    private $categorias;
    private $maxPercent;
    private $totalCat = 0;
    private $count = 0;

    public function __construct($categorias){
        $this->categorias = $categorias;
        $this->calcTotal();
        $this->calcPart();
    }

    public function getCategorias(){
        return $this->categorias;
    }

    public function calcTotal()
    {
        foreach ($this->categorias as $categoria) {
            foreach ($categoria->getPurchases() as $purchase) {
                $this->count++;
                $this->totalCat += $purchase->getValor();
            }
        }

    }

    public function calcPart(){
        $contador = 0;
        foreach($this->categorias as $categoria){
            $catTotal = $categoria->getTotal();
            $percent = round(($catTotal * 100 )/ $this->totalCat, 1);
            $categoria->setPercentage($percent);

            if($contador == 0){
                $this->maxPercent = $categoria;
                $contador++;
            } else {
                $current = $this->maxPercent->getPercentage();
                if($percent > $current)
                    $this->maxPercent = $categoria;
                $contador++;
            }

        }
    }

    public function publishLabels(){
        $labels = array();
        foreach ($this->categorias as $categoria){
           array_push($labels,$categoria->getName());
        }

        $labels = json_encode($labels);
        return $labels;
    }

    public function publishPercent(){
        $percent = array();
        foreach ($this->categorias as $categoria){
            array_push($percent, $categoria->getPercentage());
        }
        $percent = json_encode($percent);
        return $percent;
    }

    public function getMaxPercent()
    {
       return $this->maxPercent;
    }

    public function getTotalCat()
    {
        return $this->totalCat;
    }

    public function getCount()
    {
        return $this->count;
    }
}

