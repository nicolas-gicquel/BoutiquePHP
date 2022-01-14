<?php
include 'database/connexion.php';

$req1 = $pdo->prepare("SELECT * FROM products INNER JOIN categories ON products.categoryId = categories.categoryId");
$req1->execute();
$products = $req1->fetchAll(PDO::FETCH_ASSOC);

$req2 = $pdo->prepare("SELECT * FROM categories");
$req2->execute();
$categories = $req2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layout/head.php' ?>
    <title>Super Bike</title>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand logo" href="#!"><img class="logo" src="img/logo.jpg"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Accueil</a></li>
                    <?php
                    foreach ($categories as $key => $value) { ?>
                        <li class="nav-item"><a class="nav-link" href="#!"><?= $value['nameCategory'] ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Panier
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
                <a class="btn btn-outline-dark btn-connect" href="login.php">Connexion</a>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <div class="card card-form">
        <div class="card-body">
            <h2>Création d'un nouvel utilisateur</h2>
            <form class="form-fluid" action="users/createForm.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input class="form-control" type="text" name="lastName" placeholder="Nom">
                </div>
                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input class="form-control" type="text" name="firstName" placeholder="Prénom">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input class="form-control" type="password" name="mdp" placeholder="Mot de passe">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="mail" name="mail" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input class="form-control" type="text" name="adress" placeholder="Adresse">
                </div>
                <div class="mb-3">
                    <label class="form-label">Code Postal</label>
                    <input class="form-control" type="text" name="postalCode" placeholder="Code Postal">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ville</label>
                    <input class="form-control" type="text" name="city" placeholder="Ville">
                </div>
                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <input class="form-control" type="file" name="photoUser">
                </div>

                <input class="btn btn-primary" type="submit" value="Créer un compte">
            </form>
        </div>
    </div>
</body>

</html>