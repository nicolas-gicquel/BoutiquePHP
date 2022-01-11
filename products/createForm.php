<?php
$pdo = new PDO('mysql:host=localhost;dbname=boutiquephp;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_POST) {
        $nameCategory = $_POST['nameProduct'];var_dump($nameCategory);
        $price = $_POST['price'];var_dump($price);
        $stockProduct = $_POST['stockProduct'];var_dump($stockProduct);
        $descriptionProduct = $_POST['descriptionProduct'];var_dump($descriptionProduct);
        $categoryId = $_POST['categoryId'];var_dump($categoryId);
        $imageProduct = $_FILES['imageProduct']['name'];var_dump($imageProduct);
        if ($nameCategory != "") {
            $req1 = $pdo->prepare("
            INSERT INTO products(nameProduct,price,stockProduct,descriptionProduct,categoryId,imageProduct)
            VALUES (:nameProduct,:price,:stockProduct,:descriptionProduct,:categoryId,:imageProduct)
        ");
    
            $req1->execute(array(
                ':nameProduct' => $nameCategory,
                ':price' => $price,
                ':stockProduct' => $stockProduct,
                ':descriptionProduct' => $descriptionProduct,
                ':categoryId' => $categoryId,
                ':imageProduct' => $imageProduct
            ));

            header('location:products.php');
        }
        else{
            header('location:products.php');
        }
    }

//----------------SYSTEME D'UPLOAD D'IMAGES----------------------/
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["imageProduct"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// On vérifie si le fichier image est une image réelle ou une fausse image
if(isset($_POST["submit"])) {
 $check = getimagesize($_FILES["imageProduct"]["tmp_name"]);
 if($check !== false) {
 echo "File is an image - " . $check["mime"] . ".";
 $uploadOk = 1;
 } else {
 echo "File is not an image.";
 $uploadOk = 0;
 }
}
// On vérifie si le fichier existe déjà
if (file_exists($target_file)) {
 echo "Désolé, ce fichier existe déjà.";
 $uploadOk = 0;
 }
// On vérifie la taille de l'image
if ($_FILES["imageProduct"]["size"] > 500000) {
 echo "Désolé, ce fichier dépasse la limite de taille autorisée.";
 $uploadOk = 0;
 }
// On vérifie le type de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
 $uploadOk = 0;
}
// On vérifie si $uploadOk est à 0 à cause d'une erreur
if ($uploadOk == 0) {
 echo "Désolé, votre fichier n'a pas été uploader";
 // Si tout est ok on essaye d'uploader le fichier
 } else {
 if (move_uploaded_file($_FILES["imageProduct"]["tmp_name"], $target_file)) {
 echo "Le fichier ". basename( $_FILES["imageProduct"]["name"]). " a bien été uploader."
;
 } else {
 echo "Sorry, there was an error uploading your file.";
 }
 }
//---------------------FIN SYSTEME D'UPLOAD D'IMAGES------------------------------/
