<?php include '../header.php'; ?>
<main class="container mt-5">
    <h1 class="text-center mb-4">Bienvenue à la Banque</h1>

    <div class="row">
        <div class="col-md-4 text-center mb-4">
            <!-- Logo de la banque -->
            <img src="../../assets/images/IMG.jpg" alt="Logo de la banque" class="img-fluid" style="max-width: 100%; height: auto;">
        </div>
        <div class="col-md-8">
            <h2>Ouvrir un compte</h2>
            <form action="../../controleurs/ControleurCompte.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                    <div class="invalid-feedback">
                        Veuillez saisir votre nom.
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">
                        Veuillez saisir une adresse email valide.
                    </div>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                    <div class="invalid-feedback">
                        Veuillez saisir un mot de passe.
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                    <div class="invalid-feedback">
                        Veuillez saisir votre date de naissance.
                    </div>
                </div>
                <div class="form-group">
                    <label for="type_compte">Type de compte</label>
                    <select class="form-control" id="type_compte" name="type_compte" required>
                        <option value="">Choisissez un type</option>
                        <option value="courant">Compte courant</option>
                        <option value="epargne">Compte épargne</option>
                        <option value="salaire">Compte salaire</option>
                        <option value="autre">Autre</option>
                    </select>
                    <div class="invalid-feedback">
                        Veuillez choisir un type de compte.
                    </div>
                </div>
                <div class="form-group">
                    <label for="devise">Devise</label>
                    <select class="form-control" id="devise" name="devise" required>
                        <option value="">Choisissez une devise</option>
                        <option value="franc">Franc</option>
                        <option value="dollar">Dollar</option>
                    </select>
                    <div class="invalid-feedback">
                        Veuillez choisir une devise.
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control-file" id="photo" name="photo" required>
                    <div class="invalid-feedback">
                        Veuillez télécharger une photo.
                    </div>
                </div>
                <div class="form-group">
                    <label for="signature">Signature</label>
                    <input type="file" class="form-control-file" id="signature" name="signature" required>
                    <div class="invalid-feedback">
                        Veuillez télécharger une signature.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Créer un compte</button>
            </form>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
