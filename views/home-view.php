<?php include_once 'template/head.php' ?>

<?php var_dump($_SESSION); ?>
<?php var_dump($_COOKIE); ?>
<div class="container">
    <form action="" method="POST">
        <input class="d-block mx-auto" type="mail" name="mail" placeholder="mail@mail.fr">
        <input class="d-block mx-auto" type="password" name="password" placeholder="password">
    </form>
    <a href="../controllers/register-controller.php">inscription</a>
</div>

<?php include_once 'template/footer.php' ?>