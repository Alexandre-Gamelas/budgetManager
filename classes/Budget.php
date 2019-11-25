<?php
class Budget
{
    private $total;
    private $categorias = array();

    public function __construct($total){
        $this->total = $total;
    }
}