<?php

namespace App\Controller;

use App\Model\User;
use App\Utils\Utilitaire;

class UserController
{
    // Attributs
    private User $user;

    public function __construct()
    {
        //injection de dépendance
        $this->user = new User();
    }

    // Connexion de l'user
    public function login()
    {
        $message ="";
        if (isset($_POST["submit"])) {
            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $email = Utilitaire::sanitize($_POST["email"]);
                $password = Utilitaire::sanitize($_POST["password"]);
                $this->user->setEmail($email);
                //Vérifier si l'email existe
                if ($this->user->isEmailExist()) {
                    //Récupérer l'utilisateur
                    $user = $this->user->findUserByEmail();
                    //Vérifier le mot de passe
                    if (password_verify($password, $user->getPassword())) {
                        $_SESSION['user'] = $user;
                        header("Location: " . BASE_URL);
                        exit();
                    } else {
                        $message ="Mot de passe incorrect.";
                    }
                } else {
                    $message ="L'email n'existe pas.";
                }
            } else {
                $message = "Veuillez remplir les champs requis.";
            }
        }
        include "App/View/viewConnexion.php";
    }
}


