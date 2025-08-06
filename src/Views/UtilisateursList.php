<?php

use connexion\Models\Utilisateur;

// définition du titre de la page
$title = "Liste des utilisateurs";
?>

<h1>Utilisateurs</h1>

<?php foreach ($utilisateurs as $utilisateur) { ?>

    <div>
        <h3>Login : <?= $utilisateur->getEmail()?></h3>
        <p>Email : <?= $utilisateur->getLogin() ?></p>
    </div>
<?php
} // fin du foreach 
?>

