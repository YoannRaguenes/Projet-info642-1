<?php
	include("connect_bdd.php");
	if(isset($_POST['id'])){
		$id = $_POST['id'];	

		$sql = "UPDATE suivi_demande_materiel SET etat = 'etat3' WHERE id_suivi = '$id'";
		$sth = $base->prepare($sql);
		$sth->execute();
	}
?>










