<?php

$pdo = new PDO('mysql:host=localhost;port=3306','root',''); 
$sql = "CREATE DATABASE IF NOT EXISTS `boutiquephp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);


try{
    $pdo = new PDO('mysql:host=localhost;dbname=boutiquephp;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
 
    $sql = "CREATE TABLE IF NOT EXISTS `boutiquephp`.`users` ( 
        `idUser` INT NOT NULL AUTO_INCREMENT , 
        `mdp` VARCHAR(255) NOT NULL , 
        `mail` VARCHAR(255) NOT NULL ,
        `firstname` VARCHAR(255) NOT NULL ,
        `lastname` VARCHAR(255) NOT NULL ,
        `adress` VARCHAR(255) NOT NULL ,
        `postalCode` VARCHAR(13) NOT NULL ,
        `city` VARCHAR(255) NOT NULL ,
        `role` ENUM('ADMIN', 'EDITOR', 'USER') ,
        `dateRegister` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`idUser`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS `boutiquephp`.`products` ( 
      `idProduct` INT NOT NULL AUTO_INCREMENT , 
      `nameProduct` VARCHAR(255) NOT NULL , 
      `price` FLOAT NOT NULL ,
      `stockProduct` INT NOT NULL ,
      `descriptionProduct` TEXT NOT NULL ,
      `categoryId`,
      `dateCreate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
      PRIMARY KEY (`idUser`)) ENGINE = InnoDB;";

  $pdo->exec($sql);

    
 
    echo 'Félicitations, les tables ont été créée';
    
}
  catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
 }