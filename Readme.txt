Recréer le env.php 

const BDD_LOGIN = "";
const BDD_PASSWORD = "";
const BDD_SERVER = "";
const BDD_NAME = "";
const BASE_URL = "";


Ouvrir le Terminal Bash et ecrire : 
composer install

Dans .gitignore : 
utils/
/vendor/
composer.lock
/public/image/*.*
env.php

Créer dossier Utils avec : 
Database.php
Utilitaire.php