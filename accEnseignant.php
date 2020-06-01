<?php 
session_start();
if (is_null($_SESSION['id_prof']) AND !empty($_SESSION['id_etud']) AND isset($_SESSION['id_etud']))
{
	header('Location: http://localhost/projet-info642/accEtudiant.php');
	exit();
}
if (is_null($_SESSION['id_prof']) AND !empty($_SESSION['id_serv']) AND isset($_SESSION['id_serv']))
{
	header('Location: http://localhost/projet-info642/accTechnicien.php');
	exit();
}

	



?>
<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href="accEnseignant.css"  type="text/css" />
    </head>
    <body>
	
		<div id="entete">
		
			<div id="cadreConnec">
			
			<p> <a href ="infoUser.php"> Mes informations </a></p>
			<p><a href="deconnexion.php">Se déconnecter</a></p>

			</div>		
		
			<div id="Bienvenue">
			<h2>Bienvenue sur la plateforme de commande de matériel</h2>
			</div>
		
			
			
		</div>
		

		<div id="main">
			<div id="menu">
				<input type="submit" id='submit'onclick=window.location.href='accEnseignant.php' value='ACCUEIL' >
				<input type="submit" id='submit'onclick=window.location.href='page_2_enseignant.php' value='DEMANDES EN ATTENTE' >
				<input type="submit" id='submit'onclick=window.location.href='demande_traitees_enseignant.php' value='DEMANDES TRAITEES' >
				<input type="submit" id='submit' onclick=window.location.href='messagerie.php' value='MESSAGERIE' >
				<input type="submit" id='submit'onclick=window.location.href='qcm.php' value='ENQUETE DE SATISFACTION' >
				<div id="logopopo">
					<img src="images\logoPOPO.jpg" alt="" />
					</div>
			
			</div>
			
			

		<div id="contenu">
			Bienvenue sur la plateforme de consulations des demandes de matériel!
			<p>Vous pourrez ici consulter les demandes matériel de vos étudiant ainsi que les compléter avant de les envoyer au service technique</p>
		<video width=1000 height=500 preload="auto" loop="" muted="" autoplay="" playsinline="">
                <source src="HomePolytech.mp4" type="video/mp4">
                                           
            </video>
				
		</div>
		</div>

		<div id="footer">
		Site réalisé par Adrien Simard, Roshan Nepaul, Kévin Fanton et Yoann Raguenes
		<p> Etudiants en 3ème année de la filière IDU de Polytech Annecy-Chambéry</p>
	

		</div>
	</body>
</html>	