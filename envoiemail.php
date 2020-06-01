 <?php 
 	session_start();
 	include('connect_bdd.php');


 	if(isset($_GET['section']))
 	{
 		$section =htmlspecialchars($_GET['section']);
 	} else {
 		$section ="";
 	}









 	if(isset($_POST['recup_valider'], $_POST['recup_mail']))
 	{
 		if(!empty($_POST['recup_mail']))
 		{
 			$recup_mail = htmlspecialchars($_POST['recup_mail']);
 			//Verification du bon format du mail
 			if(filter_var($recup_mail, FILTER_VALIDATE_EMAIL))
 			{
 				$mailexist = $base->prepare('SELECT id_personne, nom, prenom FROM personne WHERE email=?' );
 				$mailexist->execute(array($recup_mail));
 				$mailexist_count = $mailexist ->rowCount();
 				if($mailexist_count == 1)
 				{

 					$tab= $mailexist->fetch();

 					$nom_etu = $tab['nom'];
 					$prenom_etu = $tab['prenom'];
 					
 					$_SESSION['recup_mail'] = $recup_mail;
 					$recup_code = "";

 					for ($i=0; $i <8 ; $i++) 
 					{ 
 						$recup_code .= mt_rand(0,9);
 					}
 					

 					//Verification si l'email est deja dans la base de recuperation
 					$mail_recup_exist = $base->prepare('SELECT id FROM recuperation WHERE email = ?');
 					$mail_recup_exist->execute(array($recup_mail));
 					$mail_recup_exist = $mail_recup_exist->rowCount();
 					//SI le mail existe on met le code a jour et confirme a 0
 					if($mail_recup_exist == 1)
 					{
	 					$recup_insert = $base ->prepare('UPDATE recuperation SET code = ? WHERE email = ?');
	 					$recup_insert->execute(array($recup_code,$recup_mail));
	 					$reset_confirme = $base->prepare('UPDATE recuperation SET confirme = 0 WHERE email =?');
 						$reset_confirme -> execute(array($_SESSION['recup_mail']));


 					}
 					//SI non on insere le mail et le code
 					else
 					{
	 					$recup_insert = $base ->prepare('INSERT INTO recuperation (email,code) VALUES (? , ?)');
	 					$recup_insert->execute(array($recup_mail,$recup_code));
 					}
 					
 					// Parametre d'encodage
			 		 $header="MIME-Version: 1.0\r\n";
			         $header.='From:"[gestionCommande]"<commandePROJ642@gmail.com>'."\n";
			         $header.='Content-Type:text/html; charset="utf-8"'."\n";
			         $header.='Content-Transfer-Encoding: 8bit';
			         $message = '
			         <html>
			         <head>
			           <title>Récupération de mot de passe</title>
			           <meta charset="utf-8" />
			         </head>
			         <body>
			           <font color="#303030";>
			             <div align="center">
			               <table width="600px">
			                 <tr>
			                   <td>
			                     
			                     <div align="center">Bonjour <b>'.$nom_etu." ".$prenom_etu. '</b>,</div>
			                     <p>Voici votre code de récupération :<b>'.$recup_code.' </b></p>
			                     A bientôt sur <a href="http://localhost/projINFO642/connexion.php">Gestion Commande</a> !
			                     
			                   </td>
			                 </tr>
			                 <tr>
			                   <td align="center">
			                     <font size="2">
			                      <p>Ceci est un email automatique, merci de ne pas y répondre</p>
			                     </font>
			                   </td>
			                 </tr>
			               </table>
			             </div>
			           </font>
			         </body>
			         </html>
			         ';
			    mail($recup_mail, "Récuperation de votre mot de passe sur Gestion Commande", $message, $header);
			    header ("Location: http://localhost/projet-INFO642/envoiemail.php?section=code");    
 				} 
 				else
 				{
 					$error = "Cette adresse mail n'est pas enregistrée";
 				}

  			}
  			else
 			{
 				$error = "Adresse mail invalide";
 			}
 		}
 	} 

 	if(isset($_POST['verif_submit'],$_POST['verif_code']))
 	{
 		if(!empty($_POST['verif_code']))
 		{
 			$verif_code = htmlspecialchars($_POST['verif_code']);
 			$verif_req = $base -> prepare('SELECT id FROM recuperation WHERE email = ? and code = ?');
 			$verif_req -> execute(array($_SESSION['recup_mail'],$verif_code));
 			$verif_req = $verif_req -> rowCount();
 			if($verif_req == 1) 
 			{	
 				$up_req = $base->prepare('UPDATE recuperation SET confirme = 1 WHERE email =?');
 				$up_req -> execute(array($_SESSION['recup_mail']));
 			
 				header ("Location: http://localhost/projet-INFO642/envoiemail.php?section=changemdp");
 			}
 			else
 			{
 				$error = "Code invalide";
 			}
 		}
 		else
 		{
 			$error ="Veuillez entrer votre code de confirmation";
 		}
 	}

 	if(isset($_POST['change_submit'])) // si je clique sur submit mes champs sont renseigné
 	{
  		if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) // oui mais non si on examine l'element on peux change le nom de change_mdp et valider quand meme
	 	{
	 			$verif_confirm = $base  -> prepare ('SELECT confirme FROM recuperation WHERE email = ?');
 				$verif_confirm -> execute(array($_SESSION['recup_mail']));
 				$verif_confirm = $verif_confirm ->fetch();
 				$verif_confirm = $verif_confirm['confirme'];
 			if ($verif_confirm == 1) 
 			{
	 			$mdp = htmlspecialchars($_POST['change_mdp']);
	 			$mdpc = htmlspecialchars($_POST['change_mdpc']);
	 			if (!empty($mdp) AND !empty($mdpc))
	 			{
	 				if($mdp == $mdpc)
	 				{
	 					$mdp_hache = password_hash($mdp, PASSWORD_DEFAULT); //proteger le mot de passe
	 					$ins_mdp = $base -> prepare ('UPDATE personne SET password = ? WHERE email = ?');
	 					$ins_mdp -> execute (array($mdp_hache, $_SESSION['recup_mail']));
	 					$del_req = $base->prepare('DELETE FROM recuperation WHERE email = ?');
 						$del_req -> execute(array($_SESSION['recup_mail']));
	 					header ("Location: http://localhost/projet-INFO642/connexion.php");
	 				}
	 				else
	 				{
	 					$error = "Vos mot de passe ne correspondent pas";
	 				}
	 			}
	 			else
	 			{
	 				$error ='Veuillez remplir tous les champs';
	 			}
	 		}	 	
		 	else 
		 	{
		 		$error ="Veuillez valider votre mail grâce au code de vérification";
		 	}
		}
		else
		{
			$error = "Veuillez remplir tous les champs";
	 	}
 	}



 	require_once('envoiemail_view.php');
?>