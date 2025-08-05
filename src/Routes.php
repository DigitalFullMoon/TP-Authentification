<?php

namespace connexion;

use connexion\Core\Router;

use connexion\Controllers\LoginController;
use connexion\Controllers\UtilisateurController;

// Instanciation du router
$router = new Router();

// Définition de toutes les routes du site
$router->addRoute('/', LoginController::class, 'login');
    
// page administrateur
$router->addRoute('/utilisateurs/list', UtilisateurController::class, 'list');