<?php

namespace connexion\Controllers;

use connexion\Core\Controller;
use connexion\Models\UtilisateurDAO;
use connexion\Models\Utilisateur;

/**
 * Contrôleur permettant de gérer les pages liées aux utilisateurs
 */
class UtilisateurController extends Controller {

    /**
     * Méthode appelée pour charger les utilisateur et les renvoyer à la vue "UtilisateursList"
     */
    public function list()
    {
        // appel à un DAO pour récupérer les utilisateurs
        $utilisateurs = UtilisateurDAO::getAll();
        
        $data = compact("utilisateurs");

        $this->render("UtilisateursList", $data);
    }
    /**
     * Méthode pour enregistrer un nouvel utilisateur.
     */
    public function register()
    {
        error_log(print_r($_POST, true));
        // tableau associatif à passer à la vue
        $data = [];
        // vérification de la présence d'informations concernant la connexion (requête "post")
        if (!empty($_POST)) {
            error_log($_POST['email']);
            //recupere les informations du formulaire
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fonction = $_POST['fonction'];                     
            // hachage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            // instanciation de l'utilisateur
            $utilisateur = new Utilisateur($login, $email, $hashed_password, $fonction);
            // enregistrement de l'utilisateur dans la base de données
            $utilisateur = UtilisateurDAO::create($utilisateur);
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