<section id="register-container">
    <h1 class="card-title text-center mb-4" id="title">Ajouter un Utilisateur</h1>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="rounded-4">
                <div class="card-body" id="register">
                    <form action="register" method="post" id="registerForm">
                        <div class="row justify-content-center">
                            <div class="col-md-8">

                                <!-- Utilisateur -->
                                <div class="mb-3 row">
                                    <label for="utilisateur" class="col-sm-4 col-form-label text-start">Utilisateur :</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="utilisateur" id="utilisateur" class="form-control">
                                        <div class="invalid-feedback">Veuillez entrer un nom d'utilisateur.</div>
                                    </div>
                                </div>

                                <!-- Mot de passe -->
                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-4 col-form-label text-start">Mot de passe :</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" id="password" class="form-control">
                                        <div class="invalid-feedback">Veuillez entrer un mot de passe.</div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-4 col-form-label text-start">Email :</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" id="email" class="form-control">
                                        <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
                                    </div>
                                </div>

                                <!-- Fonction -->
                                <div class="mb-3 row">
                                    <label for="fonction" class="col-sm-4 col-form-label text-start">Fonction :</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fonction" id="fonction" class="form-control">
                                        <div class="invalid-feedback">Veuillez entrer une fonction.</div>
                                    </div>
                                </div>

                                <!-- Boutons -->
                                <div class="row mb-3">
                                    <div class="offset-sm-4 col-sm-8">
                                        <button type="submit" class="btn btn-success me-2">Enregistrer</button>
                                        <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Bouton "Retour à l'accueil" -->
                        <div class="row justify-content-end">
                            <div class="col-md-8 text-end">
                                <a href="index.php" class="btn btn-outline-primary">Retour à l'accueil</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div
    <?php
    if (isset($error_message)) {
    ?>
        <div>
            <p><?= $error_message ?></p>
        </div>
    <?php
    } ?>
</section>