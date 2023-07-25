<?php include_once 'template/head.php' ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 text-center">
            <p class="h1">Bonjour, <?= $_SESSION['user']['firstname'] ?></p>
        </div>
    </div>
    <div class="row justify-content-center mx-0">
        <div class="col-6">

            <p class="text-center">Dernières notes de frais</p>

            <ol class="list-group list-group-numbered">

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Déplacement</div>
                        Train Paris - Lyon
                    </div>
                    <span class="badge bg-primary rounded-pill">en cours</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Hébergement</div>
                        Hotel Lyon
                    </div>
                    <span class="badge bg-primary rounded-pill">en cours</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Restaurant</div>
                        Restaurant Lyon
                    </div>
                    <span class="badge bg-success rounded-pill">validée</span>
                </li>

            </ol>

            <a class="btn btn-dark my-2" href="">+ Ajout d'une nouvelle note</a>

        </div>
    </div>
</div>

<?php include_once 'template/footer.php' ?>