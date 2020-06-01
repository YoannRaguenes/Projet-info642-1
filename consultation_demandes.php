<style>
<?php include 'page_2.inc.css';
?>
</style>
<body id="titre">
	<h2>Consultation des demandes</h2>

<div id="modif">
	<?php
	session_start();
	include("connect_bdd.php");
	$sql =  "SELECT *
			 FROM demande_materiel";
			$sth = $base->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll();
	echo "<form action = 'consult.php' method='post'>";
	echo "<label>Demandes</label> : <select name='demande'>";
			foreach ($result as $row) {
			    echo "<option>".$row['description'];			}
	echo "</select>";
	echo "<input type='submit' id='bouton_consul' value='Consulter'>";
	echo "</form>";	

	?>
</div>