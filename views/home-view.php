<?php include_once 'template/head.php' ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 text-center">
            <p class="h1"><?= ucfirst($_SESSION['user']['firstname']) . ' ' . strtoupper($_SESSION['user']['lastname']) ?></p>
        </div>
    </div>
    <div class="row justify-content-center mx-0">
        <div class="col-6">

            <p class="text-center">Dernières notes de frais</p>

            <ol class="list-group list-group-numbered">

                <?php foreach (Expense_report::getAllExpenseReports($_SESSION['user']['id']) as $expense) { ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class=""><span class="fs-6 text-secondary"><?= $expense['exp_date'] ?></span> <span class="fs-6 text-dark"><?= $expense['typ_name'] ?></span></div>
                            <?= $expense['exp_description'] ?>
                        </div>
                        <span class="badge bg-<?= STATUS[$expense['sta_id']] ?> rounded-pill"><?= $expense['sta_name'] ?></span>
                    </li>
                <?php } ?>

            </ol>

            <a class="btn btn-dark mt-4" href="../controllers/add-expense-controller.php">+ Ajout d'une nouvelle note</a>

        </div>
    </div>
</div>

<?php include_once 'template/footer.php' ?>