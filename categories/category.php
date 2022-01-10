<?php
$pdo = new PDO('mysql:host=localhost;dbname=boutiquephp;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req1 = $pdo->prepare("SELECT * FROM categories");
$req1->execute();
$categories = $req1->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="createCategory.php" method="post">
        <input type="text" name="nameCategory">
        <input type="submit" value="Créer une categorie">
    </form>
</body>

<ul>
    <?php
        foreach ($categories as $key => $value) {
            echo "<li>$value[nameCategory]</li>";
        }
    ?>
</ul>
<br/> 
<br/> 
<br/> 
</html>