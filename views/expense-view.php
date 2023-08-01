<?php include_once 'template/head.php' ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 text-center">
            <p class="h1"><?= ucfirst($_SESSION['user']['firstname']) . ' ' . strtoupper($_SESSION['user']['lastname']) ?></p>
        </div>
    </div>
    <div class="row justify-content-center mx-0">
        <div class="col-6 p-4 bg-light">
            <?php var_dump($expense) ?>
            <p class="h1">Note de frais</p>
            <p class="h3"><?= Form::formatDateUsToFr($expense['exp_date']) ?></p>
            <hr>
            <p class="h5 text-secondary"><?= $expense['exp_description'] ?></p>
            <hr>
            <p>Montant TTC : <span class="fw-bold"><?= $expense['exp_amount_ttc'] ?></span> €</br>
                Montant HT : <span class="fw-bold"><?= $expense['exp_amount_ht'] ?></span> €<br>
                Montant TVA (<?= $expense['typ_tva'] ?>%): <span class="fw-bold"><?= $expense['exp_amount_ttc']  - $expense['exp_amount_ht'] ?></span> €</p>
            <hr>
            <p class="fw-bold">Justificatif</p>
            <img class="img-fluid border border-dark" src="data:image/png;base64,<?= $expense['exp_proof'] ?>" alt="Justificatif note de frais" target="_blank">
            <a class="btn btn-secondary my-2" href="../controllers/home-controller.php">Retour</a>
        </div>
    </div>
</div>

<?php include_once 'template/footer.php' ?>