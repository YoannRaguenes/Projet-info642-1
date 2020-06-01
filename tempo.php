<?php
	session_start();

	include('connect_bdd.php');
	
		
	
	if(isset($_SESSION['id_prof']))
	{
	header('Location: http://localhost/projet-info642/accEnseignant.php');
	exit();
	}

	if(isset($_SESSION['id_etud']))
	{
		
	header('Location: http://localhost/projet-info642/accEtudiant.php');
	exit();

	}

	if(isset($_SESSION['id_serv']))
	{
	header('Location: http://localhost/projet-info642/accTechnicien.php');
	exit();		
	}


	
?>