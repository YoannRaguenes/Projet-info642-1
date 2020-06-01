<?php 		
session_start();
include('connect_bdd.php');
if (!isset($_SESSION['id']))
{
	header ("Location: http://localhost/projet-INFO642/deconnexion.php");

	 				
}



?>
<?php
if(isset($_GET['bleue']))
{
	$link = "infoUserBlue.css";
	$_SESSION['bleue'] = 1;
	$_SESSION['rose'] = 0;
}
elseif(isset($_GET['rose']))
{
	$link = "infoUserPink.css";
	$_SESSION['bleue'] = 0;
	$_SESSION['rose'] = 1;
	
}
else{
	if(isset($_SESSION['bleue']) AND ($_SESSION['bleue'] == 1 ))
	{
		$link = "infoUserBlue.css";

	}
	elseif(isset($_SESSION['rose']) AND ($_SESSION['rose'] == 1))
	{
		$link = "infoUserPink.css";
	
	}
	else
	{
		$link ="infoUserBlue.css";
	}
}
?>


<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href= <?= $link ?>  type="text/css" />
    </head>
    <body>
    	<div id="fond">
     		<div id= "formul">
	            <form  method="POST">

	            	<fieldset>
		                <legend>Vos Informations</legend>
		                
		                
		                <p><b> Nom : </b> <?= $_SESSION['nom']  ?>
		               	<p><b> Prenom : </b> <?= $_SESSION['prenom']  ?>
		               	<p><b> Adresse mail : </b> <?= $_SESSION['email']  ?>

		               	<?php 
		               	if(isset($_SESSION['num_etu']) AND !empty($_SESSION['num_etu'] ))
		               	{
		               		echo'<p><b> Numéro étudiant : </b>'.$_SESSION['num_etu'] ;  
		               	}
		             	?>

		                <p><b>Nouveau mot de passe :</b></p>

		                <input type="password" placeholder="Ancien mot de passe" name="old_pass" required=""  ></p>
		                <input type="password" placeholder="Nouveau mot de passe" name="new_pass" required=""  ></p>
		                <input type="password" placeholder="Confirmation du mot de passe" name="confirm_pass" required=""  ></p>
		                <input type="submit" name='modif_pass' value='Modification' >
		               
			                <?php 
							if (isset($_SESSION['id_prof']))
							{
								echo "<a href ='accEnseignant.php'> Retour à l'acceuil</a>";

							}
							if (isset($_SESSION['id_etud']))
							{
								echo "<a href ='accEtudiant.php'> Retour à l'acceuil</a>";
							}

							if (isset($_SESSION['id_serv']))
							{
								echo "<a href ='accTechnicien.php'> Retour à l'acceuil</a>";	
							}
							?>

						

		            </fieldset>
	                
	            </form>


	            <?php
	            if (isset($_POST['old_pass'], $_POST['modif_pass'],$_POST['new_pass'],$_POST['confirm_pass']))
	            {
	            	$old_mdp = $_POST['old_pass'];
	            	$new_pass = $_POST['new_pass'];
	            	$confirm_mdp = $_POST['confirm_pass'];
	            	$old_mdp = $_POST['old_pass'];
		            $mail = $_SESSION['email'];

					$userexist = $base->prepare("SELECT nom, prenom, password FROM personne WHERE email='$mail'" );
				 	$userexist->execute();
				 	$userexist = $userexist ->fetch();


		            if( password_verify($old_mdp, $userexist['password']))
		            {
		            		if($new_pass == $confirm_mdp)
		            		{
		            				$mdp_hache = password_hash($new_pass, PASSWORD_DEFAULT);
		            				$sql = $base->prepare("UPDATE personne SET password = '$mdp_hache' WHERE email = '$mail'" );
				 					$sql->execute();
				 					$ok = "Mot de passe changé avec succés";
		            		}
		            		else
		            		{
		            			$erreur = "Les mots de passe ne correspondent pas";
		            		}
		            }
		            else
		            {
		            	$erreur ="Ancien mot de passe incorrect";
		            }
	            }

	            ?>

		         
	           	<?php 
	            	if(isset($erreur))
	            	{
	            		echo '<span style="color:red">'.$erreur.'</span>';
	            	}
	            	elseif (isset($ok))
	            	{
	            		echo '<span style="color:green">'.$ok.'</span>';
	            	}
	            	else
	            	{
	            		echo "<br />";
	            	}
	            ?>

			</div>
		</div>
		<div id="fond2">
			<div id=formul2>
				<form method="GET">
	            	<fieldset>
	            		<legend>Personnalisation</legend>
	            		<p><b>Thème :</b></p> 
		                <input type="checkbox" name ="bleue"  id="onclick"/> <label>Bleue </label>
		                <input type="checkbox" name ="rose"  id="onclick"/> <label>Rose</label>
		
		                <input type="submit" name='modif_pass' value='Changement de couleur' >
		            </fieldset>
	           	</form>
	       
			</div>
		</div>

	</body>
</html>	