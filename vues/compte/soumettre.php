<?php include '../header.php'; ?>

<main class="container">
    <h2>Veuillez soumettre votre fichier PDF</h2>
    <div class="row">
        <div class="col-md-4 text-center">
            <!-- Logo de la banque -->
            <img src="../../assets/images/IMG.jpg" alt="Logo de la banque" class="img-fluid" style="max-width: 100%; height: auto;">
        </div>
        <div class="col-md-8">
            <form action="../../controleurs/ControleurFichier.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="objet">Objet</label>
                    <input type="text" placeholder="demande d'ouverture de compte" class="form-control" id="objet" name="objet" required>
                    <div class="invalid-feedback">
                        Veuillez saisir l'objet.
                    </div>
                </div>
                <div class="form-group">
                    <label for="fichier">Importer le fichier PDF</label>
                    <input type="file" class="form-control-file" id="fichier" name="fichier" accept=".pdf" required>
                    <div class="invalid-feedback">
                        Veuillez télécharger le fichier PDF.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Soumettre</button>
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
