<?php

class Week
{
    private $purchases;
    private $week = array();

    public function __construct($purchases)
    {
        $this->purchases = $purchases;
        $this->sortDays();
    }

    public function getPurchases()
    {
        return $this->purchases;
    }

    public function setPurchases($purchases)
    {
        $this->purchases = $purchases;
    }

    public function sortDays(){
        $this->week['Mon'] = array();
        $this->week['Tue'] = array();
        $this->week['Wed'] = array();
        $this->week['Thu'] = array();
        $this->week['Fri'] = array();
        $this->week['Sat'] = array();
        $this->week['Sun'] = array();

        foreach($this->purchases as $purchase){
            $date = new DateTime($purchase->getDate());
            $day = $date->format("D");
            //array_push($this->week[$day], $purchase);
            switch ($day){
                case "Mon":
                    array_push($this->week['Mon'], $purchase);
                    break;
                case "Tue":
                    array_push($this->week['Tue'], $purchase);
                    break;
                case "Wed":
                    array_push($this->week['Wed'], $purchase);
                    break;
                case "Thu":
                    array_push($this->week['Thu'], $purchase);
                    break;
                case "Fri":
                    array_push($this->week['Fri'], $purchase);
                    break;
                case "Sat":
                    array_push($this->week['Sat'], $purchase);
                    break;
                case "Sun":
                    array_push($this->week['Sun'], $purchase);
                    break;
            }
        }
    }

    public function getWeek()
    {
        return $this->week;
    }

    public function getTotalDay($day){
        $total = 0;
        foreach($day as $purchase){
            $total += $purchase->getValor();
        }
        return $total;
    }

    public function publishTotals(){
        $totalDays = array();
        foreach ($this->week as $day){
            $total = $this->getTotalDay($day);
            if($total > 0)
                array_push($totalDays,$this->getTotalDay($day));
            else
                array_push($totalDays,false);
        }
        $totalDays = json_encode($totalDays);
        return $totalDays;
    }

    public function getDay($day){
        return $this->week[$day];
    }


}