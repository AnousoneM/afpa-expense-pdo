<?php include_once 'template/head.php' ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 text-center">
            <p class="h1"><?= ucfirst($_SESSION['user']['firstname']) . ' ' . strtoupper($_SESSION['user']['lastname']) ?></p>
        </div>
    </div>
    <div class="row justify-content-center mx-0">
        <div class="col-6 p-4 mb-4 bg-light">

            <?php
            // Je mets en place une condition pour afficher une div lorsque la note de frais est validée ou refusée.
            if ($expense['sta_id'] == 2 || $expense['sta_id'] == 3) { ?>
                <div class="alert alert-<?= STATUS[$expense['sta_id']] ?>" role="alert">
                    <ul class="list-unstyled">
                        <li class="fw-bold"><?= Form::formatDateUsToFr($expense['exp_decision_date']) ?></li>
                        <li><?= $expense['exp_cancel_reason'] ?></li>
                    </ul>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col">
                    <p class="h1">Note de frais</p>
                    <p class="h3"><?= Form::formatDateUsToFr($expense['exp_date']) ?></p>
                </div>
                <div class="col">
                    <p class="text-end"><span class="badge bg-<?= STATUS[$expense['sta_id']] ?> rounded-pill"><?= $expense['sta_name'] ?></span></p>
                    <p class="h5 text-end fs-italic"><?= $expense['typ_name'] ?></p>
                </div>
            </div>

            <hr>
            <p class="h5 text-secondary"><?= $expense['exp_description'] ?></p>
            <hr>

            <ul class="list-unstyled">
                <li>Montant TTC : <span class="fw-bold"><?= $expense['exp_amount_ttc'] ?></span> €</li>
                <li>Montant HT : <span class="fw-bold"><?= $expense['exp_amount_ht'] ?></span> €</li>
                <li>Montant TVA (<?= $expense['typ_tva'] ?>%) : <span class="fw-bold"><?= $expense['exp_amount_ttc']  - $expense['exp_amount_ht'] ?></span> €</li>
            </ul>

            <hr>
            <p class="fw-bold">Justificatif</p>
            <img class="img-fluid border border-dark" src="data:image/png;base64,<?= $expense['exp_proof'] ?>" alt="Justificatif note de frais" target="_blank">
            <a class="btn btn-secondary my-4" href="../controllers/home-controller.php">Retour</a>
            
            <?php 
            // nous mettons en place une condition pour afficher les boutons modifier et supprimer uniquement lorsque la note de frais est en attente de validation.
            if($expense['sta_id'] == 1) { ?>
                <a class="btn btn-info ms-5" href="../controllers/validate-expense-controller.php?expense=<?= $expense['exp_id'] ?>">Modifier</a>
                <a class="btn btn-danger ms-1" href="../controllers/delete-expense-controller.php?expense=<?= $expense['exp_id'] ?>">Supprimer</a>
            <?php } ?>

        </div>
    </div>
</div>

<?php include_once 'template/footer.php' ?>