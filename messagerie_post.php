<?php
// Connexion à la base de données
    include('connect_bdd.php');
    session_start();


if(isset($_POST['insertion']))
{

	$mail_exist = $base->prepare('SELECT id_personne FROM personne WHERE email = ?');
	$mail_exist->execute(array($_POST['email_recu']));
	$mail_verif_exist = $mail_exist->rowCount();

	if ($mail_verif_exist == 0){
		$erreur = "Mauvais destinataire";

	}
	else
	{
		
		$req = $base->prepare('INSERT INTO messagerie (email, message, destinataire) VALUES(?, ?, ?)');
		$req->execute(array($_POST['email_envoie'], $_POST['message'], $_POST['email_recu']));
		$ok = "Email envoyé";

	}


}

 

 if (isset($_POST['suppression']))
 {
 	$id =$_POST['id_reponse'];
 	$delete = $base->prepare("DELETE FROM messagerie WHERE id = '$id' ");
 	$delete ->execute();
 }



// Redirection du visiteur vers la page du minichat
header('Location: messagerie.php');
exit();
?>