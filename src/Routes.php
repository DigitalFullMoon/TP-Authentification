<?php

namespace connexion;

use connexion\Core\Router;

use connexion\Controllers\HomeController;
use connexion\Controllers\LoginController;
use connexion\Controllers\UtilisateurController;

// Instanciation du router
$router = new Router();

// Définition de toutes les routes du site
$router->addRoute('/', HomeController::class, 'index');
$router->addRoute('/login', LoginController::class, 'login');
    
// page administrateur
$router->addRoute('/utilisateurs/list', UtilisateurController::class, 'list');