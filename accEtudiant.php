<?php
 session_start();


if (is_null($_SESSION['id_etud']) AND !empty($_SESSION['id_prof']) AND isset($_SESSION['id_prof']))
{
	header('Location: http://localhost/projet-info642/accEnseignant.php');
	exit();
}
if (is_null($_SESSION['id_etud']) AND !empty($_SESSION['id_serv']) AND isset($_SESSION['id_serv']))
{
	header('Location: http://localhost/projet-info642/accTechnicien.php');
	exit();
}

	
 
if(isset($_SESSION['bleue']) AND ($_SESSION['bleue'] == 1 ))
{
	$link = "accEtudiant.css";

}
elseif(isset($_SESSION['rose']) AND ($_SESSION['rose'] == 1))
{
	$link = "accEtudiantPink.css";
	
}
else{
	$link ="accEtudiant.css";
}


?>

<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href=<?= $link ?> type="text/css" />
    </head>
    <body>
	
		<div id="entete">
		
			<div id="cadreConnec">
			
			 <p><a href ="infoUser.php"> Mes informations </a></p>
			
			<p><a href="deconnexion.php">Se déconnecter</a></p>
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
				<input type="submit" id='submit' onclick=window.location.href='messagerie.php' value='MESSAGERIE' >
				
				<input type="submit" id='submit'onclick=window.location.href='qcm.php' value='ENQUETE DE SATISFACTION' >
				<div id="logopopo">
				<img src="images\logoPOPO.jpg" alt="" />
			</div>				
			</div>
			
			

		<div id="contenu">
			Bienvenue Sur le site de demande de matériel!
			<br>
			<p>Tu pourras ici y faire des demandes ainsi que consulter tes demandes en cours et ainsi en suivre l'avancement</p>
			
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
