<?php session_start();

if (is_null($_SESSION['id_serv']) AND !empty($_SESSION['id_prof']) AND isset($_SESSION['id_prof']))
{
	header('Location: http://localhost/projet-info642/page_2_enseignant.php');
	exit();
}
if (is_null($_SESSION['id_serv']) AND !empty($_SESSION['id_etud']) AND isset($_SESSION['id_etud']))
{
	header('Location: http://localhost/projet-info642/page_2.php');
	exit();
}

?>
<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href="demande_attente_technicien.css"  type="text/css" />
    </head>
    <body>
	
		<div id="entete">
		
	
		
			<div id="Bienvenue">
			<h1>Bienvenue sur la plateforme de commande de matériel</h1>
			</div>
		
			
			
		</div>
		

		<div id="main">
			<div id="menu">
				<input type="submit" id='submit'onclick=window.location.href='accTechnicien.php' value='ACCUEIL' >
				<input type="submit" id='submit'onclick=window.location.href='demande_attente_technicien.php' value='DEMANDES EN ATTENTE' >
				<input type="submit" id='submit'onclick=window.location.href='demande_traitees_technicien.php' value='DEMANDES TRAITEES' >
				<input type="submit" id='submit' onclick=window.location.href='messagerie.php' value='MESSAGERIE' >
				
								<div id="logopopo">
					<img src="images\logoPOPO.jpg" alt="" />
				</div>					
				</div>
			
			

		<div id="contenu">
			<?php
				
				include("connect_bdd.php");
				$sql =  "SELECT * FROM suivi_demande_materiel WHERE etat NOT LIKE 'etat3'";
						$sth = $base->prepare($sql);
						$sth->execute();
						$result = $sth->fetchAll();
						?>
						<div id="form">
			<form action = 'demande_validation_technicien.php' method='post'>
				<fieldset>
					<legend>Consultation des demandes en attente</legend>
				<?php
						
				
				echo "<label>Demandes</label> : <select name='demande'>";
						foreach ($result as $row) {
							$temp = $row['id_suivi'];
							$sql = "SELECT * FROM toute_demandes WHERE id = '$temp'";
							$sth = $base->prepare($sql);
							$sth->execute();
							$resultat = $sth->fetchAll();
							foreach ($resultat as $rows) {
 						    	echo "<option>".$rows['description'];}			
 						}
				echo "</select>";
				?>
				<input type='submit' id='bouton_consul' value='Consulter'>
				</fieldset>
				</form>	
			
			
		</div>
		</div>

		<div id="footer">
		<br>Site réalisé par Adrien Simard, Roshan Nepaul, Kévin Fanton et Yoann Raguenes</br>
		<br> Etudiants en 3ème année de la filière IDU de Polytech Annecy-Chambéry</br>
			
		</div>
	</body>
</html>	