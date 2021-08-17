<?php
try {
    include '../database/connexion.php';

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>



<?php
    include '../layout/head.php';
?>



    <h2>Création d'un nouvel utilisateur</h2>
    <form action="createUser.php" method="post" >
        <input type="text" name="firstName" placeholder="Prénom">
        <input type="text" name="lastName" placeholder="Nom">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <input type="mail" name="mail" placeholder="Email">
        <input type="text" name="adress" placeholder="Adresse">
        <input type="text" name="postalCode" placeholder="Code Postal">
        <input type="text" name="city" placeholder="Ville">
        <input type="submit" value="Créer un compte">
    </form>



    

    
</body>

</html>