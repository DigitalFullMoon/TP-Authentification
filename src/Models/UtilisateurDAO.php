<?php

namespace connexion\Models;

use connexion\Tools\Database;

use PDO;

/**
 * Classe à utiliser pour requêter la base de données pour récupérer les informations des utilisateurs.
 */
class UtilisateurDAO
{

    /**
     * Permet d'obtenir un tableau de tous les utilisateurs.
     */
    public static function getAll(): array
    {
        // récupération de l'objet de requêtage
        $pdo = Database::connect();

        // instanciation d'un tableau de stagaires
        $utilisateurs = array();
        $sql = "SELECT * from utilisateurs";

        $results = $pdo->query($sql);

        // boucle sur toutes les lignes de résultat
        foreach ($results as $row_result) {
            $utilisateur = self::createUserFromRow($row_result);

            // ajout de l'utilisateur au tableau d'utilisateurs
            array_push($utilisateurs, $utilisateur);
        }

        // déconnexion de la base de données
        Database::disconnect();
        return $utilisateurs;
    }

    /**
     * Permet d'obtenir un utilisateur par son identifiant
     */
    public static function getById(int $id): Utilisateur
    {
        // récupération de l'objet de requêtage
        $pdo = Database::connect();
        $statement = $pdo->prepare("SELECT * from utilisateurs WHERE :id_user");

        // association des paramètres sur la requête
        $statement->bindParam("id_user", PDO::PARAM_INT);
        $statement->execute();

        // récupération du résultat
        $row_result = $statement->fetch();

        // instanciation de l'utilisateur
        $utilisateur = self::createUserFromRow($row_result);

        // déconnexion de la base de données
        Database::disconnect();
        return $utilisateur;
    }

    /**
     * Retourne l'utilisateur en fonction  
     */
    public static function getByEmail(string $email): ?Utilisateur
    {

        $pdo = Database::connect();

        $statement = $pdo->prepare("select * from utilisateurs where email_user LIKE :email_user");

        $statement->bindParam("email_user", $email);

        $statement->execute();
        // récupération de l'enregistrement de l'utliisateur
        $row_result = $statement->fetch();

        // intialisation de la variable qui va contenir une instance d'utilisateur
        $utilisateur = null;
        if ($row_result != false) {
            // instanciation de l'utilisateur en fonction d'une ligne d'enregistrement
            $utilisateur = self::createUserFromRow($row_result);
        }

        // déconnexion de la base de données
        Database::disconnect();
        return $utilisateur;
    }

    /**
     * Instancie un utilsateur à partir d'un enregistrement sous la forme d'un tableau associatif
     * Attention, il faut que le tableau associatif soit complet
     * 
     * @param $array_row L'enregistrement provenant de la BDD stocké dans un tableau associatif
     */
    private static function createUserFromRow(array $row_result): Utilisateur
    {

        // récupération du résultat à partir du tableau
        $id = $row_result['id_user'];
        $email = $row_result['email_user'];
        $login = $row_result['login_user'];
        $password = $row_result['pwd_user'];
        $fonction = $row_result['fonction'];

        // instanciation de l'utilisateur
        $utilisateur = new Utilisateur($email, $login, $password, $fonction, $id);

        return $utilisateur;
    }

    /**
     * Permet de créer un utilisateur dans la base de données
     * 
     * @param Utilisateur $utilisateur L'utilisateur à créer
     * @return Utilisateur|null L'utilisateur créé ou null si l'insertion a échoué
     */
    public static function create(Utilisateur $utilisateur): ?Utilisateur
    {

        $pdo = Database::connect();
        //ecrire la requête d'insertion
        $statement = $pdo->prepare("INSERT INTO utilisateurs (email_user, login_user, pwd_user, fonction) VALUES (:email, :login, :password, :fonction)");
        //faire la requête
        $statement->bindParam(":email", $utilisateur->getEmail());
        $statement->bindParam(":login", $utilisateur->getLogin());
        $statement->bindParam(":password", $utilisateur->getPassword());
        $statement->bindParam(":fonction", $utilisateur->getFonction());

        $result = $statement->execute();
        
        if ($result) {
            // si la requête a réussi, on récupère l'id de l'utilisateur inséré
            $utilisateur->setId($pdo->lastInsertId());
        
            //déconnexion de la base de données
            Database::disconnect();
        } else {

            //déconnexion de la base de données
            Database::disconnect();

            // si la requête a échoué, on retourne null
            return null;
        }

        //retourner l'utilisateur
        return $utilisateur;
    }
}
