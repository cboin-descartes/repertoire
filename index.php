<?php
include("entete.php");
?>


<!-- Attention : il n'y a aucune sécurité ici, juste un formulaire de connexion.
Les pages du site restent accessibles à tout le monde 

Il faudrait aujouter des sessions > Bonus possible -->
<h1>Authentification</h1>

<form action="index.php" method="post">
	<table>
		<tr><td><label for="pseudo">Pseudo (toto)</label></td><td>
			<input type="text" name="pseudo" /></td></tr>
		<tr><td><label for="mdp">Mot de passe</label></td><td>
			<input type="password" name="mdp" /></td></tr>
	</table>
	<br />
	<input type="reset" name="reset" value="Effacer" /> 
	<input type="submit" name="submit" value="Valider" />
</form>


<?php
if(isset($_POST["pseudo"])){
    if($_POST["pseudo"]=='toto'){
		//On vérifie juste si le login vaut toto (aucune sécurité) et on redirige
        header("Location:accueil.php?page=afficher");
    }
    else
    {
        echo "<div class=erreur> Erreur de login </div>";
    }
    
}
?>

<?php
    include('pieddepage.php');
?>
