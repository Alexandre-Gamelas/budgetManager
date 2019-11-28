<?php
include "Budget.php";
class User
{
    private $id;
    private $name;
    private $email;
    private $nationality;

    private $budget;
    private $distribution;
    private $categorias;
    private $favourites;

    private $role;
    private $job;

    public function __construct($id, $name, $email, $nationality, $budget, $role, $job)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->nationality = $nationality;
        $this->budget = new Budget($budget);
        $this->role = $role;
        $this->job = $job;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    public function getBudget()
    {
        return $this->budget;
    }

    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }


    public function getJob()
    {
        return $this->job;
    }

    public function setJob($job)
    {
        $this->job = $job;
    }

    public function getDistribution()
    {
        return $this->distribution;
    }

    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;
    }

    public function getCategorias()
    {
        return $this->categorias;
    }

    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
    }

    public function getFavourites()
    {
        return $this->favourites;
    }

    public function setFavourites($favourites)
    {
        $this->favourites = $favourites;
    }




    public function figureOutCategoria($purchase){
        $id = $purchase->getCategoria();
        foreach ($this->categorias as $categoria){
            $idSearch = $categoria->getId();
            if($id == $idSearch){
                return $categoria;
                break;
            }
        }
    }



}