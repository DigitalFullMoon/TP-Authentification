<?php

namespace connexion\Controllers;

use connexion\Core\Controller;
use connexion\Models\Utilisateur;
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
        if (!empty($_POST)) {
            // authentification de l'utilisateur
            $email = $_POST['email'];
            $password = $_POST['password'];
            $utilisateurName = $_POST['utilisateur'];

            // hachage du mot de passe 
            // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $utilisateur = UtilisateurDAO::getByEmail($email);

            // si l'utilisateur a été retrouvé, alors connexion possible
            if (password_verify($password, $utilisateur->getPassword())) {
                // redirection vers la liste des utilisateurs si la connexion s'est effectué avec succès
                header("Location: /utilisateurs/list");
                die();
            } else {
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
        if (!empty($_POST)) {
            //recupere les informations du formulaire
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fonction = $_POST['fonction'];                     
            // hachage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            // instanciation de l'utilisateur
            $utilisateur = new Utilisateur('', $nom, $email, $hashed_password, $fonction);
            // enregistrement de l'utilisateur dans la base de données
            $utilisateur = UtilisateurDAO::create(new \connexion\Models\Utilisateur('', $nom, $email, $hashed_password, ''));
            // si l'utilisateur a été créé, alors redirection vers la page de connexion
            $utilisateur_bdd = null;

            // cas de l'utilisateur null (problème lors de l'insertion)
            if (is_null($utilisateur_bdd)) {
                // échec de la création
                // ajout d'un message d'erreur à fournir à la page de login
                $error_message = "Erreur lors de la création de l'utilisateur.";
                // ajout d'un duo clef->valeur à passer à la vue
                $data['error_message'] = $error_message;
                
            } else { // cas de succès !
                // redirection vers la page de login
                header("Location: /");
                die();
            }

        }
        $this->render('Register', $data);
    }
}
