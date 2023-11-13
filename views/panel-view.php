<?php include_once 'template/head.php' ?>

<div class="container mt-5">

    <div class="row justify-content-center mx-0">
        <div class="col-lg-8 col-12 mt-2 mb-5">

            <p class="text-center h3 mb-4">Dernières notes de frais</p>

            <ol class="list-group list-group-numbered">
                <?php
                $expenses = Expense_report::getAllExpenseReportsByStatus(1);
                if (empty($expenses)) { ?>
                    <!-- si pas de notes de frais enregistrées, afficher un message -->
                    <p class="text-center">Pas de notes de frais d'enregistrées</p>

                    <?php } else {
                    foreach ($expenses as $expense) { ?>

                        <a href="../controllers/expense-controller.php?expense=<?= $expense['exp_id'] ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class=""><span class="text-dark fw-bold"><?= ucfirst($expense['typ_name']) ?></span> - <span class="expense-date text-secondary"><?= Form::formatDateUsToFr($expense['exp_date']) ?></span></div>
                                <?= $expense['exp_description'] ?><br>
                                <span class="my-fs-7"><i class="me-1 bi bi-person-circle"></i>Enregistrée par : <?= $expense['emp_lastname'] ?></span>
                            </div>
                            <span class="badge bg-<?= STATUS[$expense['sta_id']] ?> rounded-pill"><?= $expense['sta_name'] ?></span>
                        </a>
                <?php }
                } ?>

            </ol>

        </div>
    </div>

</div>

<?php include_once 'template/footer.php' ?>