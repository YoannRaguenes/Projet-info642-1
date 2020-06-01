<?php	
	include("connect_bdd.php");	
	if(isset($_POST['id']) && isset($_POST['ue']) && isset($_POST['nom']) && isset($_POST['description_e'])){
		$id = $_POST['id'];
		$ue = $_POST['ue'];
		$nom = $_POST['nom'];
		$description = $_POST['description_e'];
		$commentaire = $_POST['commentaire'];

		$sql = "UPDATE demande_enseignant SET UE = '$ue', nom = '$nom', description = '$description', commentaire = '$commentaire' WHERE id = '$id' ";
		$sth = $base->prepare($sql);
		$sth->execute();


		$sql = "UPDATE suivi_demande_materiel SET etat = 'etat2' WHERE id_suivi = '$id'";
	    $sth = $base->prepare($sql);
		$sth->execute();

		$sql = "UPDATE toute_demandes SET UE = '$ue', description_e = '$description', commentaire = '$commentaire' WHERE id = '$id' ";
		$sth = $base->prepare($sql);
		$sth->execute();

		echo '<body onLoad="alert(\'Votre ajout a bien été pris en compte!\')">';
		echo '<meta http-equiv="refresh" content="0;URL=accEnseignant.php">';
	}
?>