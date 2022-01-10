<?php





if ($_POST) {
    $id = $_POST['idProduit'];
    
    $req1 = $pdo->prepare("SELECT * FROM products WHERE idProduct = $id");
    $req1->execute();
    $client = $req1->fetch();

    $nameCategory = $_POST['nameProduct'];
    var_dump($nameCategory);
    $price = $_POST['price'];
    var_dump($price);
    $stockProduct = $_POST['stockProduct'];
    var_dump($stockProduct);
    $descriptionProduct = $_POST['descriptionProduct'];
    var_dump($descriptionProduct);
    $categoryId = $_POST['categoryId'];
    var_dump($categoryId);
    $imageProduct = $_FILES['imageProduct']['name'];
    var_dump($imageProduct);

    $req2 = $pdo->prepare("UPDATE `products` 
                        SET `nameProduct`= :nameProduct ,`price`= :price,`stockProduct`= :stockProduct,`descriptionProduct`= :descriptionProduct,`categoryId`= :categoryId,`imageProduct`= :imageProduct 
                        WHERE idClient = $id");

    $req2->execute(array(
        ':nameProduct' => $nameCategory,
        ':price' => $price,
        ':stockProduct' => $stockProduct,
        ':descriptionProduct' => $descriptionProduct,
        ':categoryId' => $categoryId,
        ':imageProduct' => $imageProduct
    ));

    header('location:products.php');
}
