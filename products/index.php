<?php
session_start();
if (!$_SESSION) {
    header('location:../login.php');
}
include '../database/connexion.php';
include '../layout/adminTemplate.php';

$req1 = $pdo->prepare("SELECT * FROM products INNER JOIN categories ON products.categoryId = categories.categoryId");
$req1->execute();
$products = $req1->fetchAll(PDO::FETCH_ASSOC);

$req2 = $pdo->prepare("SELECT * FROM categories");
$req2->execute();
$categories = $req2->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="card grid-margin">
    <div class="card-body">
        <form class="form-group row" action="createForm.php" method="post" enctype="multipart/form-data">
            <div class="col-lg-4 productForm">
                <input type="text" name="nameProduct" placeholder="Libellé du produit">
                <select name="categoryId">
                    <?php
                    foreach ($categories as $key => $value) { ?>
                        <option value="<?= $value['categoryId'] ?>"><?= $value['nameCategory'] ?></option>
                    <?php
                    }
                    ?>

                </select>
                <input type="file" name="imageProduct">
            </div>
            <div class="col-lg-4 productForm">
                <input type="number" step="0.01" name="price" placeholder="Prix du produit">
                <input type="number" name="stockProduct" placeholder="Produits en stock">
            </div>
            <div class="col-lg-4">
                <textarea name="descriptionProduct" cols="30" rows="10">Description du produit</textarea>
            </div>
            <input class="productSubmit nav-link btn btn-success create-new-button" type="submit" value="Créer un nouveau produit">
        </form>
    </div>
</div>
<div class="card grid-margin">
    <div class="card-body">
        <table class="table-fluid indexTable">
            <thead>
                <th class="alignLeft">Libellé</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                foreach ($products as $key => $value) { ?>
                    <tr>
                        <td class="alignLeft"><?= $value['nameProduct'] ?></td>
                        <td><?= $value['nameCategory'] ?></td>
                        <td><?= $value['price'] ?>€</td>
                        <td><?= $value['stockProduct'] ?></td>
                        <td><img src="../img/<?= $value['imageProduct'] ?>" alt="image produit" width=150 height=100></td>
                        <td class="actionTable"><a href="update.php?id=<?= $value['idProduct'] ?>"><i class="mdi mdi-update"></i></a><a href="delete.php?id=<?= $value['idProduct'] ?>"><i class="mdi mdi-delete"></a></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <h5>Description Détaillée</h3>
                        </td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="alignLeft" colspan="6"><?= $value['descriptionProduct'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include '../layout/adminFooter.php';
?>