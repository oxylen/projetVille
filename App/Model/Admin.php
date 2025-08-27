<?php

namespace App\Model;

use App\Utils\Database;

class Admin 
{
    // Attributs
    private int $idAdmin;
    private string $email;
    private string $password;

    // BDD
    private \PDO $bdd;

    // Constructor
    public function __construct()
    {
        $this->bdd = (new Database())->connectBDD();
    }

    //Getters et Setters
    public function getIdAdmin() 
    {
        return $this->idAdmin;
    }
    public function setIdAdmin(int $idAdmin): self
    {
        $this->idAdmin = $idAdmin;
        return $this;
    }
}