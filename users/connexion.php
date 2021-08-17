<!-- Traitement du formulaire de login/mot de passe -->
<?php

try {
    include '../database/connexion.php';



    $mail = $_POST['mail'];

    //  Récupération de l'utilisateur et de son pass hashé
    $req = $pdo->prepare('SELECT * FROM users WHERE mail = :mail');
    $req->execute(array(
        'mail' => $mail
    ));
    $resultat = $req->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);
    

    if (!$resultat) {
        echo 'Mauvais identifiant ou mot de passe !';
        header("location:../login.php");
    } else {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['idUtilisateur'] = $resultat['idUtilisateur'];
            $_SESSION['firstname'] = $resultat['firstname'];
            $_SESSION['lastname'] = $resultat['lastname'];
            header("location:../index.php");
        } else {
            header("location:../login.php");
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
