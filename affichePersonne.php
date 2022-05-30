<?php
/*Fonction permettant de générer les formulaires de suppression
pour chaque ligne du tableau des personnes */
function formSuppression($login){
return '<form method="POST" action="accueil.php?page=supprimer">
    <input type=hidden name="login" value="'.$login.'">
    <input type="submit" name="submit" value="X" />
    </form>';
}

?>



<h1>Liste des personnes </h1>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Login</th>
        <th>Numéro Tel</th>
        <th>Email</th>
        <th>Supprimer</th>
    </tr>
    <?php
    try {
        $cnx = connectBD();

        foreach ($cnx->query('SELECT * from personne') as $ligne) {
            //Affichage du tableau HTML des personnes
            echo "<tr> 
                <td>" . $ligne['nom'] . "</td>
                <td>" . $ligne['prenom'] . "</td>
                <td>" . $ligne['login'] . "</td>
                <td>" . $ligne['num_tel'] . "</td>
                <td>" . $ligne['email'] . "</td><td>";
                echo formSuppression($ligne['login']);
                echo "</td></tr>";
        }
    } catch (PDOException $e) {
        echo "<div class=erreur> Erreur de connexion à la base de données ! </div>";
        // Ligne suivante à utiliser pour le débogage
        //echo  $e->getMessage() . "<br/>";
        die();
    }

    ?>

</table>