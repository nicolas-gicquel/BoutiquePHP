<?php
$pdo = new PDO('mysql:host=localhost;dbname=boutiquephp;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_POST) {
        $nameCategory = $_POST['nameCategory'];
        if ($nameCategory != "") {
            $req1 = $pdo->prepare("
            INSERT INTO categories(nameCategory)
            VALUES (:nameCategory)
        ");
    
            $req1->execute(array(
                ':nameCategory' => $nameCategory
            ));

            header('location:newCategory.php');
        }
        else{
            header('location:newCategory.php');
        }
    }



