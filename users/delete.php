<?php
if ($_GET['id']) {
    $idUser = $_GET['id'];
    try {

        $pdo = new PDO('mysql:host=localhost;dbname=boutiquephp;port=3306', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM users WHERE idUser= $idUser";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    header('location:index.php');
}