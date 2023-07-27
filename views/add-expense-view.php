<?php //include_once 'template/head.php'; 
?>

<h1 class="text-center mt-4 mb-2 font-pangolin">Note de frais</h1>

<div class="row justify-content-center mx-0 mb-5">
    <div class="container col-lg-8 col-10 px-lg-5 px-3 pb-5 rounded shadow bg-light">

        <div class="form-error my-3 text-center"><?= $errors['bdd'] ?? '' ?></div>

        <?php if ($showForm) { ?>

            <!-- novalidate permet de désactiver la validation HTML5 lorsqu'il y a des required-->
            <!-- penser à mettre enctype="multipart/form-data" pour les fichiers -->
            <form action="" method="POST" enctype="multipart/form-data" novalidate>

                <?php
                var_dump($_POST);
                var_dump($_FILES);
                ?>

                <div class="row justify-content-center mx-0">

                    <div class="col-lg-6 px-3">

                        <div class="mb-4">
                            <label for="weight" class="form-label">Date *</label>
                            <span class="form-error"><?= $errors['date'] ?? '' ?></span>
                            <!-- nous mettons la date du jour à l'aide de la fonction date() de PHP -->
                            <input type="date" class="form-control" name="date" id="date" value="<?= $_POST['date'] ?? date('Y-m-d') ?>" required>
                        </div>

                        <label for="specie" class="form-label">Type de frais *</label>
                        <span class="form-error"><?= $errors['type'] ?? '' ?></span>
                        <select class="form-select form-select-sm mb-4" name="type" id="type">
                            <option value="" selected disabled>Choix du type</option>
                            <option value="1">Déplacement</option>
                        </select>

                        <div class="mb-4">
                            <label for="amount" class="form-label">Montant TTC *</label>
                            <span class="form-error"><?= $errors['amount'] ?? '' ?></span>
                            <input type="number" class="form-control" name="amount" id="amount" value="<?= $_POST['amount'] ?? '' ?>" required>
                        </div>

                        <div class="mb-4">
                            <label for="amountHT" class="form-label">Montant HT *</label>
                            <input type="number" class="form-control" id="amountHT" name="amountHT" value="<?= $_POST['amountHT'] ?? '' ?>" readonly>
                        </div>

                        <div class="mb-4">
                            <label for="amountHT" class="form-label">TVA *</label>
                            <input type="number" class="form-control" id="tva" name="tva" value="<?= $_POST['tva'] ?? '' ?>" readonly>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Motif *</label>
                            <span class="form-error"><?= $errors['description'] ?? '' ?></span>
                            <textarea class="form-control" id="description" name="description" placeholder="ex. Déplacement chez le client ... " rows="3"><?= $_POST['description'] ?? '' ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="proof" class="form-label">Justificatif *</label>
                            <span class="form-error"><?= $errors['proof'] ?? '' ?></span>
                            <input type="file" class="form-control" name="proof" id="proof" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-lg-0 mb-3">Enregistrer</button>
<<<<<<< HEAD:views/expense-form-view.php
                            <a href="../controllers/home-controller.php" class="btn btn-outline-secondary">Annuler</a>
=======
                            <a href="../controllers/home-controller.php" class="btn btn-outline-secondary font-pangolin">Annuler</a>
>>>>>>> 292b1e91c01536db8350d496d1f01abf1566a663:views/add-expense-view.php
                            <p class="mt-3">* Champs obligatoires</p>
                        </div>

                    </div>

                </div>

            </form>


            <?php

            if (isset($test)) { ?>
                <img class="img-fluid" src="data:image/webp;base64,<?= $test ?>" alt="image">
            <?php } ?>





        <?php } else { ?>
            <!-- Nous indiquons que tout est ok -->
            <p class="text-center h3">La note a bien été pris en compte.</p>
            <div class="text-center py-3">
                <a href="../controllers/login-controller.php" class="btn btn-primary font-pangolin m-1">Connexion</a>
            </div>

        <?php } ?>
    </div>
</div>

<!-- appelle du JS pour le calcul en live -->
<script src="../assets/js/script.js"></script>

<?php include_once 'template/footer.php'; ?>