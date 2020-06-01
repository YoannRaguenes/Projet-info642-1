<?php
	include("connect_bdd.php");
	$demande = $_POST['demande'];	
	$sql = "SELECT * FROM toute_demandes WHERE description = '".$demande."'";
	$sth = $base->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	$id = $result[0][0];
	$numero = $result[0][1];
	$description = $result[0][2];
	$budget = $result[0][3];
	$produit = $result[0][4];
	$quantite = $result[0][5];
	$fournisseur = $result[0][6];
	$prix = $result[0][7];
	$lien = $result[0][8];
	$image = $result[0][9];
	$jour = $result[0][10];
	$mail = $result[0][11];
	$ue = $result[0][12];
	$nom = $result[0][13];
	$description_e = $result[0][14];
	$commentaire = $result[0][15];	

?>
<body>
	<h2 id="titre">Consultation de la demande</h2>
	<div  id="consultation">
		<fieldset>
					<legend>Demande</legend>
					<?php
					echo "Id de la demande:",$id;
					echo "<br>";
					echo "Description de la demande: ",$description;
					echo "<br>";
					echo "Numéro étudiant du demandeur :",$numero;
					echo "<br>";
					echo "Budget de la demande: ",$budget;
					echo "<br>";
					echo "Produit demandé: ",$produit;
					echo "<br>";
					echo "Quantité demandée: ",$quantite;
					echo "<br>";
					echo "Fournisseur du produit:",$fournisseur;
					echo "<br>";
					echo "Prix unitaire du produit:",$prix;
					echo "<br>";
					echo "Lien marchand vers le site du produit:",$lien;
					echo "<br>";
					echo "Image du produit:",$image;
					echo "<br>";
					echo "Date de la demande:",$jour;
					echo "<br>";
					echo "Mail du demandeur :",$mail;
					echo "<br>";
					echo "Nom de l'enseignant:",$nom;
					echo "<br>";
					echo "UE enseigné:",$ue;
					echo "<br>";
					echo "Description supplémentaire du projet :",$description_e;
					echo "<br>";
					echo "Commentaire de l'enseignant :",$commentaire;
					echo "<br>";
					echo "<form action = 'validation_demande_technique.php' method='post'>";
					echo "<p><label>Id de la demande que vous voulez valider</label> : <input type='text' name='id' /></p>";
					echo "<input type='submit' id='bouton_valider' value='Valider'>";
					echo "</form>";
					?>
		</fieldset>
	</div>
</body>