<?php session_start();

if (is_null($_SESSION['id_serv']) AND !empty($_SESSION['id_prof']) AND isset($_SESSION['id_prof']))
{
	header('Location: http://localhost/projet-info642/accEnseignant.php');
	exit();
}
if (is_null($_SESSION['id_serv']) AND !empty($_SESSION['id_etud']) AND isset($_SESSION['id_etud']))
{
	header('Location: http://localhost/projet-info642/accEtudiant.php');
	exit();
}



?>
<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href="accEtudiant.css"  type="text/css" />
    </head>
    <body>
	
		<div id="entete">
		
			<div id="cadreConnec">
					
			 <p><a href ="infoUser.php"> Mes informations </a></p>
			
			<p><a href="deconnexion.php">Se déconnecter</a></p>
			</div>		
			</div>		
		
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
			Bienvenue sur la plateforme de demande matériel!
			<p>Vous pourrez ici consulter toutes les demandes efféctuées par les élève ainsi que les enseignants pour du matériel pédagogique</p>
			
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