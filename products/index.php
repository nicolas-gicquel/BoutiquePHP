<?php
include '../database/connexion.php';
include '../layout/adminTemplate.php';

$req1 = $pdo->prepare("SELECT * FROM products INNER JOIN categories ON products.categoryId = categories.categoryId");
$req1->execute();
$products = $req1->fetchAll(PDO::FETCH_ASSOC);

$req2 = $pdo->prepare("SELECT * FROM categories");
$req2->execute();
$categories = $req2->fetchAll(PDO::FETCH_ASSOC);


?>


<form class="form-group" action="createForm.php" method="post" enctype="multipart/form-data">
    <input type="text" name="nameProduct" placeholder="Libellé du produit">
    <select name="categoryId">
        <?php
        foreach ($categories as $key => $value) { ?>
            <option value="<?= $value['categoryId'] ?>"><?= $value['nameCategory'] ?></option>
        <?php
        }
        ?>

    </select>
    <input type="number" step="0.01" name="price" placeholder="Prix du produit">
    <input type="number" name="stockProduct" placeholder="Produits en stock">
    <input type="file" name="imageProduct">
    <textarea name="descriptionProduct" cols="30" rows="10">Description du produit</textarea>
    <input type="submit" value="Créer un nouveau produit">
</form>

<table class="table-fluid">
    <thead>
        <th>Libellé</th>
        <th>Catégorie</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($products as $key => $value) { ?>
            <tr>
                <td><?= $value['nameProduct'] ?></td>
                <td><?= $value['nameCategory'] ?></td>
                <td><?= $value['price'] ?>€</td>
                <td><?= $value['stockProduct'] ?></td>
                <td><?= $value['descriptionProduct'] ?></td>
                <td><img src="../img/<?= $value['imageProduct'] ?>" alt="image produit" width=150 height=100></td>
                <td><a href="update.php?id=<?= $value['idProduct'] ?>">Modifier</a><a href="delete.php?id=<?= $value['idProduct'] ?>">X</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
include '../layout/adminFooter.php';
?>
</body>

</html>