<?php session_start()?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Avancement</title>
<style type="text/css">      
#barre_init {background:grey; width:1000px; height:100px; border-radius: 100px;}
#barre_100 {background:DodgerBlue;width:1000px;height:100px; border-radius: 100px;}
#barre_75 {background:DodgerBlue;width:750px;height:100px; border-radius: 100px;}
#barre_50{background:DodgerBlue;width:500px;height:100px; border-radius: 100px;}
#barre_25{background:DodgerBlue;width:250px;height:100px; border-radius: 100px;}
#barre_0{background:DodgerBlue;width:0px;height:100px; border-radius: 100px;}
#barre_50 h1{color:white;text-align:center;font-size:250%;font-family: Arial }
#barre_valeur0 h1{color:white;text-align:center;font-size:400%;font-family: Arial }
#barre_25 h1{color:white;text-align:center;font-size:150%;font-family: Arial }
#barre_75 h1{color:white;text-align:center;font-size:300%;font-family: Arial }
#barre_100 h1{color:white;text-align:center;font-size:400%;font-family: Arial }
</style>
</head>
<body>
	<div id="barre_init">
	<?php 
	include("connect_bdd.php");

	$sql = "SELECT * FROM `demande_travaux` WHERE id_demande_travaux = 1";
	$sth = $base->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	$etat =  $result[0][1];

	$valeur_etat = $etat;
	if($valeur_etat =="etat0" ){
		echo '<div id="barre_valeur0">
							<h1>Pas de commande en cours</h1>
						</div>
					';

	}
	elseif($valeur_etat ==  "etat1"){
		echo '<div id="barre_25">
							<h1>Attente de l`avis du professeur</h1>';

	}
	elseif($valeur_etat == 'etat2'){
		echo '<div id="barre_50">
							<h1>Attente de l`avis des techniciens</h1>';

	}
	elseif($valeur_etat == 'etat3'){
		echo '<div id="barre_75">
							<h1>En cours de livraison</h1>';

	}
	else{
		echo '<div id="barre_100">
							<h1>Commande reçue</h1>';
	}

	?>


</div>
</body>
</html>