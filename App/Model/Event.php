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
    public function saveEvent(): void
    {
        try 
        {
            $title = $this->title;
            $description = $this->description;
            $dateStart = $this->dateStart;
            $dateEnd = $this->dateEnd;
            $location = $this->location;
            $img = $this->img;
            $remainingPlaces = $this->remainingPlaces;

            $request = "INSERT INTO event(title, description, date_start, date_end, location, img, remaining_places) VALUES (?,?,?,?,?,?,?)";
            $req = $this->bdd->prepare($request);
            $req->bindParam(1, $title, \PDO::PARAM_STR);
            $req->bindParam(2, $description, \PDO::PARAM_STR);
            $req->bindParam(3, $dateStart, \PDO::PARAM_STR);
            $req->bindParam(4, $dateEnd, \PDO::PARAM_STR);
            $req->bindParam(5, $location, \PDO::PARAM_STR);
            $req->bindParam(6, $img, \PDO::PARAM_STR);
            $req->bindParam(7, $remainingPlaces, \PDO::PARAM_INT);
            $req->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}