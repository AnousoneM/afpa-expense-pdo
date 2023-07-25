<?php include_once 'template/head.php' ?>


<?php
// j'ouvre une session
var_dump($_SESSION);
?>


<div class="container">
    <form action="" method="POST">
        <input class="d-block mx-auto" type="mail" name="mail" placeholder="mail@mail.fr">
        <input class="d-block mx-auto" type="password" name="password" placeholder="password">
    </form>
    <a href="../controllers/register-controller.php">inscription</a>
</div>

<?php include_once 'template/footer.php' ?>