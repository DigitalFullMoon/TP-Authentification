<?php

namespace connexion\Controllers;

use connexion\Core\Controller;
use connexion\Models\UtilisateurDAO;

/**
 * Contrôleur qui gère l'authentification des utilisateurs.
 */
class LoginController extends Controller 
{
    public function login()
    {
        // tableau associatif à passer à la vue
        $data = [];

        // vérification de la présence d'informations concernant la connexion (requête "post")
        if (!empty($_POST))
        {
            // authentification de l'utilisateur
            $email = $_POST['email'];
            $password = $_POST['password'];
            $utilisateurName = $_POST['utilisateur'];

            // hachage du mot de passe 
            // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $utilisateur = UtilisateurDAO::getByEmail($email);
            
            // si l'utilisateur a été retrouvé, alors connexion possible
            if (password_verify($password, $utilisateur->getPassword()))
            {
                // redirection vers la liste des utilisateurs si la connexion s'est effectué avec succès
                header("Location: /utilisateurs/list");
                die();
            }
            else
            {
                // ajout d'un message d'erreur à fournir à la page de login
                $error_message = "Connexion impossible, vérifiez vos informations de connexion.";
                // ajout d'un duo clef->valeur à passer à la vue
                $data['error_message'] = $error_message;
            }
        }

        // rendu de la page de login
        $this->render('Login', $data);
    }
    public function register()
    {
        // vérification de la présence d'informations concernant la connexion (requête "post")
        if (!empty($_POST))
        {
            //recupere les informations du formulaire
            //
        }
        $this->render('Register');
    }
}