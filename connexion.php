<?php
	
	include('connect_bdd.php');
	session_start();
	include_once('cookieconnect.php');
	

	if(isset($_POST['email'], $_POST['password'],$_POST['verif_conex']))
	{
		if(!empty($_POST['email']) AND (!empty($_POST['password'])))
		{
			$mdp = htmlspecialchars($_POST['password']);
			$mail = htmlspecialchars($_POST['email']);
			$mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);


			$userexist = $base->prepare("SELECT nom, prenom, password FROM personne WHERE email='$mail'" );
	 		$userexist->execute();
	 		$userexist = $userexist ->fetch();
			
			$personne = $base ->prepare("SELECT id_personne FROM personne WHERE email ='$mail'");
	 		$personne ->execute();
	 		$id_personne = $personne -> fetch();
	 		$id_pers = $id_personne[0];  

	 		$etudiant = $base ->prepare ("SELECT id_etudiant FROM etudiant WHERE id_perso = '$id_pers' ");
	 		$etudiant ->execute();
	 		$rez = $etudiant ->fetch();
	 		$id_etu = $rez[0];


	 		$prof = $base ->prepare ("SELECT id_enseignant FROM enseignant WHERE id_pers= '$id_pers' ");
	 		$prof ->execute();
	 		$rez = $prof ->fetch();
	 		$id_prof = $rez[0];


	 		$service = $base ->prepare ("SELECT id_service_technique FROM service_technique WHERE id_person= '$id_pers' ");
	 		$service ->execute();
	 		$rez = $service ->fetch();
	 		$id_serv= $rez[0];




	 		if( password_verify($mdp, $userexist['password']))
	 					{

	 						
	 						$etudiant_count = $etudiant ->rowCount();
 							if($etudiant_count == 1)
 							{

 								$numetu = $base ->prepare ("SELECT numero FROM etudiant WHERE id_perso = '$id_pers' ");
						 		$numetu ->execute();
						 		$rez = $numetu ->fetch();
						 		$num_etu = $rez[0];

						 		
	 							$_SESSION['email'] = $mail;
		 						$_SESSION['nom'] = $userexist['nom'];
		 						$_SESSION['prenom'] = $userexist['prenom'];
		 						$_SESSION['id'] = $id_pers;
		 						$_SESSION['id_etud'] = $id_etu;
		 						$_SESSION['num_etu'] = $num_etu;


		 						
 							}
 						
	 						$prof_count = $prof ->rowCount();
 							if($prof_count == 1)
 							{
 								
	 							$_SESSION['email'] = $mail;
		 						$_SESSION['nom'] = $userexist['nom'];
		 						$_SESSION['prenom'] = $userexist['prenom'];
		 						$_SESSION['id'] = $id_pers;
		 						$_SESSION['id_prof'] = $id_prof;
		 						
 							}
 						
	 						$serv_count = $service ->rowCount();
 							if($serv_count == 1)
 							{
 								
 								
	 							$_SESSION['email'] = $mail;
		 						$_SESSION['nom'] = $userexist['nom'];
		 						$_SESSION['prenom'] = $userexist['prenom'];
		 						$_SESSION['id'] = $id_pers;
		 						$_SESSION['id_serv'] = $id_serv;
		 						
 							}
		 					
		 					if(isset($_POST['rememberme']))
		 					{
		 						setcookie('email', $mail,time()+365*24*3600,null,null,false,true);
		 						setcookie('mdp', $mdp,time()+365*24*3600,null,null,false,true); 
		 					}


 							header('Location: http://localhost/projet-info642/tempo.php');
								exit();

	 				}

	 		else
	 		{
	 			$erreur ="Mot de passe ou email incorrect";
	 		}




		}

		
	}









	require_once('connexion_view.php');
?>