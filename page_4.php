<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" charset="utf8" />
        <link rel="stylesheet" href="page_4.css"  type="text/css" />
        <style type="text/css">      
		#barre_init {background:grey; width:1000px; height:50px; border-radius: 100px;}
		#barre_100 {background:DodgerBlue;width:1000px;height:50px; border-radius: 100px;}
		#barre_75 {background:DodgerBlue;width:750px;height:50px; border-radius: 100px;}
		#barre_50{background:DodgerBlue;width:500px;height:50px; border-radius: 100px;}
		#barre_25{background:DodgerBlue;width:250px;height:50px; border-radius: 100px;}
		#barre_0{background:DodgerBlue;width:0px;height:50px; border-radius: 100px;}
		#barre_50 h3{color:white;text-align:center;font-size:150%;font-family: Arial }
		#barre_valeur0 h3{color:white;text-align:center;font-size:400%;font-family: Arial }
		#barre_25 h3{color:white;text-align:center;font-size:140%;font-family: Arial }
		#barre_75 h3{color:white;text-align:center;font-size:200%;font-family: Arial }
		#barre_100 h3{color:white;text-align:center;font-size:200%;font-family: Arial }
		</style>
    </head>
    <body>
	
		<div id="entete">
		
			<div id="cadreConnec">
			Nom d'utilisateur
			<p><a href="index.php">Se déconnecter</p></a>
			</div>
			
			<div id="Bienvenue">
			<h1>Bienvenue sur la plateforme de commande de matériel</h1>
			</div>
			
		
		</div>

		<div id="main">
			<div id="menu">
				<input type="submit" id='submit'onclick=window.location.href='accEtudiant.php' value='ACCUEIL' >
				<input type="submit" id='submit'onclick=window.location.href='page_2.php' value='FAIRE UNE DEMANDE' >
				<input type="submit" id='submit'onclick=window.location.href='page_3.php' value='MES DEMANDES' >
				<input type="submit" id='submit' value='CONTACTER UN ENSEIGNANT' >
				<input type="submit" id='submit' value='CONTACTER UN TECHNICIEN' >
				<input type="submit" id='submit' value='ENQUETE DE SATISFACTION' >	
				<div id="logopopo">
				<img src="images\logoPOPO.jpg" alt="" />
					</div>	
			</div>
			
			
			

		<div id="contenu">
			<?php
			include("connect_bdd.php");
			$demande = $_POST['demande'];	
			$sql = "SELECT * FROM demande_materiel WHERE description = '".$demande."'";
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
			?>
			<div id="form">
					<fieldset>
						<?php
						echo "<legend>Consultation de la demande n°",$id,"</legend>";					
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
						?>
						<div id="barre_init">
						<?php 
						include("connect_bdd.php");
						$sql = "SELECT * FROM suivi_demande_materiel WHERE id_suivi = '$id'";
						$sth = $base->prepare($sql);
						$sth->execute();
						$result = $sth->fetchAll();
						$etat =  $result[0][1];

						$valeur_etat = $etat;
						if($valeur_etat =="etat0" ){
							echo '<div id="barre_valeur0">
									<h3>Pas de commande en cours</h3>
								  </div>';
						}
						elseif($valeur_etat ==  "etat1"){
							echo '<div id="barre_25">
									<h3>Attente avis du professeur</h3>
								  </div>';

						}
						elseif($valeur_etat == 'etat2'){
							echo '<div id="barre_50">
									<h3>Attente avis des techniciens</h3>
								  </div>';

						}
						elseif($valeur_etat == 'etat3'){
							echo '<div id="barre_75">
									<h3>En cours de livraison</h3>
								  </div>';

						}
						else{
							echo '<div id="barre_100">
									<h3>Commande reçue</h3>
								  </div>';
						}

						?>
					</div>
				</fieldset>		
			</div>
			
		</div>

		<div id="footer">
		<br>Site réalisé par Adrien Simard, Roshan Nepaul, Kévin Fanton et Yoann Raguenes</br>
		<br> Etudiants en 3ème année de la filière IDU de Polytech Annecy-Chambéry</br>
			
		</div>
	</body>
</html>	