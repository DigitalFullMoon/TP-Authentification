<section id="login-container">
    <h1 class="card-title text-center mb-4" id="title">Connexion MVC</h1>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="rounded-4">
                <div class="card-body" id="login">
                    <div class="row justify-content-between align-items-center mb-3">
                        <div class="col-6"></div>
                        <div class="col-6 text-end">
                            <a href="Register.php" class="btn btn-outline-primary">Créer un compte</a>
                        </div>
                    </div>
                    <form action="login" method="post" id="loginForm">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- Utilisateur -->
                                <div class="mb-3 row">
                                    <label for="utilisateur" class="col-sm-4 col-form-label text-start">Utilisateur :</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="utilisateur" id="utilisateur" class="form-control">
                                        <div class="invalid-feedback" id="utilisateurError">Veuillez entrer un nom d'utilisateur valide.</div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-4 col-form-label text-start">Email :</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" id="email" class="form-control">
                                        <div class="invalid-feedback" id="emailError">Veuillez entrer une adresse email valide.</div>
                                    </div>
                                </div>

                                <!-- Mot de passe -->
                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-4 col-form-label text-start">Mot de passe :</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        <div class="invalid-feedback" id="passwordError">Le mot de passe est requis.</div>
                                    </div>
                                </div>

                                <!-- Boutons -->
                                <div class="row">
                                    <div class="offset-sm-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary me-2">Valider</button>
                                        <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                    </div>
                                </div>

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