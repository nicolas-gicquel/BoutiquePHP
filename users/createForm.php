<?php
try {
    include '../database/connexion.php';

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if ($_POST) {
    $firstname = $_POST['firstName'];
    $lastname = htmlentities($_POST['lastName']);
    $mdp = $_POST['mdp'];
    $mail = $_POST['mail'];
    $adress = $_POST['adress'];
    $postalCode = $_POST['postalCode'];
    $city = $_POST['city'];
    if (empty($_POST['photoUser'])) {
        $photoUser = 'user.png';
    }else {
        
        $photoUser = $_FILES['photoUser']['name'];
    }

    // Hachage du mot de passe
    $mdp_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    // Insertion
    $req = $pdo->prepare('INSERT INTO users(firstname, lastname, mdp, mail, adress, postalCode,city, role, photoUser) 
                          VALUES(:firstname, :lastname, :mdp, :mail, :adress, :postalCode, :city, :role, :photoUser)');
    $req->execute(array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'mdp' => $mdp_hache,
        'mail' => $mail,
        'adress' => $adress,
        'postalCode' => $postalCode,
        'city' => $city,
        'role' => 'USER',
        'photoUser' => $photoUser

    ));

    // header('location:../index.php');
}else {
    header('location:newUser.php');
}
?>