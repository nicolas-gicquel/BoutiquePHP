<?php
if ($_GET['id']) {
    $idProduct = $_GET['id'];
    try {

        $pdo = new PDO('mysql:host=localhost;dbname=boutiquephp;port=3306', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM products WHERE idProduct= $idProduct";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    header('location:products.php');
}
