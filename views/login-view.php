<?php include_once 'template/head.php'; ?>

<div class="row mx-0 justify-content-center text-center">

    <div class="col-3 bg-light mt-5 pt-4 pb-5 rounded">
        <p class="fs-4">Connexion</p>
        <form action="" method="POST">
            <input class="d-block mx-auto mb-2 text-center" type="mail" name="mail" placeholder="Identifiant" required>
            <input class="d-block mx-auto mb-2 text-center" type="password" name="password" placeholder="Mot de passe" required>
            <div class="login-error border"><?= $errors['signIn'] ?? '' ?></div>
            <button class="btn btn-primary my-2" type="submit">Connexion</button>
        </form>
        <a class="d-block text-decoration-none text-dark" href="../controllers/register-controller.php">Inscription</a>
    </div>

</div>

<?php include_once 'template/footer.php'; ?>