<?php
include '../database/connexion.php';
include '../layout/adminTemplate.php';

$req1 = $pdo->prepare("SELECT * FROM users");
$req1->execute();
$users = $req1->fetchAll(PDO::FETCH_ASSOC);


?>
<h1>Liste des utilisateurs</h1>
<!-- <div class="card grid-margin">
    <div class="card-body">
        <h2>Création d'un nouvel utilisateur</h2>
        <form action="createUser.php" method="post">
            <input type="text" name="firstName" placeholder="Prénom">
            <input type="text" name="lastName" placeholder="Nom">
            <input type="password" name="mdp" placeholder="Mot de passe">
            <input type="mail" name="mail" placeholder="Email">
            <input type="text" name="adress" placeholder="Adresse">
            <input type="text" name="postalCode" placeholder="Code Postal">
            <input type="text" name="city" placeholder="Ville">
            <input type="submit" value="Créer un compte">
        </form>
    </div>
</div> -->
<div class="card grid-margin">
    <div class="card-body row">
        <table class="table-fluid indexTable col-md-12">
            <thead>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Date d'inscription</th>
                <th>Photo</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                foreach ($users as $key => $value) { ?>
                    <tr>
                        <td class="alignLeft"><?= $value['lastname'] ?></td>
                        <td><?= $value['firstname'] ?></td>
                        <td><?= $value['mail'] ?></td>
                        <td><?= $value['adress'] ?></td>
                        <td><?= $value['postalCode'] ?></td>
                        <td><?= $value['city'] ?></td>
                        <td>Le <?= date('d-m-Y à H:i:s ', strtotime($value['dateRegister'])) ?></td>
                        <td><img src="../img/<?= $value['photoUser'] ?>" alt="Photo de l'utilisateur" width=150 height=100></td>
                        <td class="actionTable"><a href="update.php?id=<?= $value['idUser'] ?>"><i class="mdi mdi-update"></i></a><a href="delete.php?id=<?= $value['idUser'] ?>"><i class="mdi mdi-delete"></a></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include '../layout/adminFooter.php';
?>