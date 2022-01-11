<?php

include '../database/connexion.php';
include '../layout/adminTemplate.php';
if ($_GET['id']) {
    $idProduct = $_GET['id'];
    $pdo = new PDO(
        'mysql:host=localhost;dbname=boutiquephp;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req1 = $pdo->prepare("SELECT * FROM products WHERE idProduct = $idProduct");
    $req1->execute();
    $product = $req1->fetch();

    $req2 = $pdo->prepare("SELECT * FROM categories");
    $req2->execute();
    $categories = $req2->fetchAll(PDO::FETCH_ASSOC);
}

?>
<h1>Modification d'un produit</h1>
<div class="card grid-margin">
    <div class="card-body">
        <form class="form-group" action="updateForm.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nameProduct" value="<?= $product['nameProduct'] ?>">
            <select name="categoryId">
                <option value="<?= $product['categoryId'] ?>"><?= $product['categoryId'] ?></option>
                <?php
                foreach ($categories as $key => $value) { ?>
                    <option value="<?= $value['categoryId'] ?>"><?= $value['nameCategory'] ?></option>
                <?php
                }
                ?>

            </select>
            <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>">
            <input type="number" name="stockProduct" value="<?= $product['stockProduct'] ?>">
            <input type="file" name="imageProduct">
            <textarea name="descriptionProduct" cols="30" rows="10"><?= $product['descriptionProduct'] ?></textarea>
            <input type="hidden" name="idProduit" value="<?= $idProduct ?>">
            <input class="nav-link btn btn-success create-new-button" type="submit" value="Modifier le produit">
        </form>

    </div>
</div>
<?php
include '../layout/adminFooter.php';
?>