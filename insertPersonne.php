<h1>Ajouter une personne</h1>
<form method="POST" action="accueil.php?page=inserer">
	<table>
		<tr>
			<td>Prénom</td>
			<td><input type="text" name="prenom" /></td>
		</tr>
		<tr>
			<td>Nom</td>
			<td><input type="text" name="nom" /></td>
		</tr>
		<tr>
			<td>Numéro de téléphone</td>
			<td><input type="text" name="num" /></td>
		</tr>
		<tr>
			<td>email</td>
			<td><input type="text" name="email" /></td>
		</tr>
		<tr>
			<td>Login</td>
			<td> <input type="text" name="login" maxlength="16" size="15" /></td>
		</tr>
		<tr>
			<td>Mot de passe</td>
			<td><input type="password" name="password" minlength="8" /></td>
		</tr>
	</table>

	<br />
	<input type="reset" name="reset" value="Annuler" />
	<input type="submit" name="submit" value="Valider" />

</form>


<?php

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login'])) {
	if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login'])) {
		echo "<p class=\"erreur\"> Saisir au moins un nom, un prenom et un login ! </p>";
	} else {
		try {
			$cnx = connectBD();
			//Préparation de la requête
			$prep = $cnx->prepare("INSERT INTO personne (login, password, nom, prenom, num_tel, email) VALUES (:login, :password, :nom, :prenom, :num_tel, :email)");
			$prep->bindParam(':nom', $nom);
			$prep->bindParam(':prenom', $prenom);
			$prep->bindParam(':num_tel', $num);
			$prep->bindParam(':email', $email);
			$prep->bindParam(':login', $login);
			$prep->bindParam(':password', $password);


			/*Parcours de la variable $_POST pour affecter à chaque variable liée
			l'un des champs du formulaire.

			La notation $$ permet de déclarer un nom de variable à l'aide du contenu d'une
			chaîne de caractères: 
			$chaine = "truc";
			$$chaine = 3;
			echo $truc; //Contient la valeur 3
			*/
			foreach ($_POST as $cle => $valeur) {
				$$cle = $valeur;
			}

			//Hachage du mot de passe (pour ne pas le laisser en clair)
			$password=sha1($password);

			// Insertion d'une ligne
			$prep->execute();
		} catch (PDOException $e) {
			echo "<div class='erreur'> Erreur d'insertion dans la base de données ! </div>";
			// Ligne suivante à utiliser pour le débogage
			//echo  $e->getMessage() . "<br/>";
			die();
		}
		echo "<p> Insertion effectuée avec succès </p>";
	}
}

?>