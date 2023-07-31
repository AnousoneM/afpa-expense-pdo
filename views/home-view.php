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
                    <a href="../controllers/add-expense-controller.php?expense=<?= $expense['exp_id']?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class=""><span class="fs6 text-dark fw-bold"><?= ucfirst($expense['typ_name']) ?></span> - <span class="expense-date text-secondary"><?= Form::formatDateUsToFr($expense['exp_date']) ?></span></div>
                            <?= $expense['exp_description'] ?>
                        </div>
                        <span class="badge bg-<?= STATUS[$expense['sta_id']] ?> rounded-pill"><?= $expense['sta_name'] ?></span>
                    </a>
                <?php } ?>

            </ol>

            <a class="btn btn-dark mt-4" href="../controllers/add-expense-controller.php">+ Ajout d'une nouvelle note</a>

        </div>
    </div>
</div>

<?php include_once 'template/footer.php' ?>