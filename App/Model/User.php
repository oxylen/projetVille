<?php

namespace App\Model;

use App\Utils\Database;

class User
{
    // Attributs
    private int $idUser;
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
    public function getIdUser() 
    {
        return $this->idUser;
    }
    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword(string $password): self {
        $this->password = $password;
        return $this;
    }
    
    
    ///////////////// Methodes /////////////////

    // Methode pour hasher le mdp
    public function hashPassword(): void {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    // Methode pour vérifier le mot de passe
    public function verifyPassword(string $hash): bool {
        return password_verify($this->password, $hash);
    }

    // Methode pour vérifier que l'email existe
    public function isEmailExist() {
        try {
            $email = $this->email;
            $request = "SELECT id_user FROM user WHERE email = ?";
            $req = $this->bdd->prepare($request);
            $req->bindParam(1, $email, \PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            if ($data) {
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    //Methode pour trouver l'utilisateur via son mail
    public function findUserByEmail() {
        try {
            $email = $this->email;
            $request = "SELECT * FROM user WHERE email = ?";
            $req = $this->bdd->prepare($request);
            $req->bindParam(1, $email, \PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            if ($data) {
                return $data;
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return null;
    }
}