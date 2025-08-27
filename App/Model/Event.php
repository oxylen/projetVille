<?php

namespace App\Model;

use App\Utils\Database;

class Event 
{
    //Attributs
    private int $idEvent;
    private string $title;
    private string $description;
    private string $dateStart;
    private string $dateEnd;
    private string $location;
    private string $img;
    private int $remainingPlaces;

    //BDD
    private \PDO $bdd;

    //Constructeur
    public function __construct()
    {
        $this->bdd = (new Database())->connectBDD();
    }

    //Getters & Setters
    public function getIdEvent(): int 
    {
        return $this->idEvent;
    }
    public function setIdEvent(int $idEvent):void
    {
        $this->idEvent = $idEvent;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDateStart(): string
    {
        return $this->dateStart;
    }
    public function setDateStart(string $dateStart): void
    {
        $this->dateStart = $dateStart;
    }

    public function getDateEnd(): string
    {
        return $this->dateEnd;
    }
    public function setDateEnd(string $dateEnd): void
    {
        $this->dateEnd = $dateEnd;
    }

    public function getLocation(): string
    {
        return $this->location;
    }
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getImg(): string
    {
        return $this->img;
    }
    public function setImg(string $img):void
    {
        $this->img = $img;
    }

    public function getRemainingPlaces(): int 
    {
        return $this->remainingPlaces;
    }
    public function setRemainingPlaces(int $remainingPlaces): void
    {
        $this->remainingPlaces = $remainingPlaces;
    }

    //Methodes
}