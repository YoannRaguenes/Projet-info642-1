<?php
	include("connect_bdd.php");	
	$sql = "UPDATE demande_travaux SET etat = 'etat3'";
	$sth = $base->prepare($sql);
	$sth->execute();
?>










