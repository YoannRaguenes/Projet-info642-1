<?php session_start();

if (is_null($_SESSION['id_etud']) AND !empty($_SESSION['id_prof']) AND isset($_SESSION['id_prof']))
{
	header('Location: http://localhost/projet-info642/demande_traitees_enseignant.php');
	exit();
}
if (is_null($_SESSION['id_etud']) AND !empty($_SESSION['id_serv']) AND isset($_SESSION['id_serv']))
{
	header('Location: http://localhost/projet-info642/demande_traitees_technicien.php');
	exit();
}

	

?>
<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href="page_3.css"  type="text/css" />
    </head>
    <body>
	
		<div id="entete">
			

			<div id="Bienvenue">
			<h1>Bienvenue sur la plateforme de commande de matériel</h1>
			</div>
			
		
		</div>

		<div id="main">
			<div id="menu">
				<input type="submit" id='submit'onclick=window.location.href='accEtudiant.php' value='ACCUEIL' >
				<input type="submit" id='submit'onclick=window.location.href='page_2.php' value='FAIRE UNE DEMANDE' >
				<input type="submit" id='submit'onclick=window.location.href='page_3.php' value='MES DEMANDES' >
				<input type="submit" id='submit' onclick=window.location.href='messagerie.php' value='MESSAGERIE' >
				
				<input type="submit" id='submit'onclick=window.location.href='qcm.php' value='ENQUETE DE SATISFACTION' >
				<div id="logopopo">
				<img src="images\logoPOPO.jpg" alt="" />
					</div>		
			</div>
			
			
			

		<div id="contenu">
			<?php
			$numero = "11704669";					
			
			include("connect_bdd.php");
			$sql =  "SELECT *
					 FROM demande_materiel WHERE numero = '$numero'";
					$sth = $base->prepare($sql);
					$sth->execute();
					$result = $sth->fetchAll();
			?>
		<div id="form">
			<form action = 'page_4.php' method='post'>
				<fieldset>
					<legend>Consultation des demandes</legend>	
					<?php				
					echo "<label>Demandes</label> : <select name='demande'>";
							foreach ($result as $row) {
							    echo "<option>".$row['description'];}
					echo "</select>";
					?>
					<input type='submit' id='bouton_consul' value='Consulter'>					
				</fieldset>
			</form>
		
		</div>
		</div>

		<div id="footer">
			<div id="credits">
			<br>Site réalisé par Adrien Simard, Roshan Nepaul, Kévin Fanton et Yoann Raguenes</br>
			<br> Etudiants en 3ème année de la filière IDU de Polytech Annecy-Chambéry</br>
			</div>
			</div>
		
	</body>
</html>	