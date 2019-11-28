<?php
class Budget
{
    private $total;
    private $alocated;

    public function __construct($total, $alocated){
        $this->total = $total;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getAlocated()
    {
        return $this->alocated;
    }

    public function setAlocated($alocated)
    {
        $this->alocated = $alocated;
    }




    function calcPercentage($valorCategoria){
        return ($valorCategoria * 100) / $this->total;
    }


}