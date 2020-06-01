<?php session_start();
if (is_null($_SESSION['id_etud']) AND !empty($_SESSION['id_prof']) AND isset($_SESSION['id_prof']))
{
	header('Location: http://localhost/projet-info642/page_2_enseignant.php');
	exit();
}
if (is_null($_SESSION['id_etud']) AND !empty($_SESSION['id_serv']) AND isset($_SESSION['id_serv']))
{
	header('Location: http://localhost/projet-info642/demande_attente_technicien.php');
	exit();
}

	

?>
<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href="page_2.css"  type="text/css" />
    </head>
    <body>
	
		<div id="entete">
		

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
			<div id="form">
			<form action = 'ajout_demande.php' method='post'>
				<fieldset>
					<legend>Ajout Demande</legend>
					<p><label>Numéro étudiant</label> : <input type='text' name='numero' /></p>
					<p><label>Description du projet</label> : <textarea type='text' name='description'></textarea></p>
					<p><label>Nom de l'enseignant (en majuscule)</label> : <input type='text' name='enseignant' /></p>
					<p><label>Ligne budgétaire</label> : <input type='number' name='budget' /></p>
					<p><label>Produits concernés</label> : <input type='text' name='produits' /></p>
					<p><label>Quantité</label> : <input type='text' name='quantite' /></p>
					<p><label>Fournisseur</label> : <input type='text' name='fournisseur' /></p>
					<p><label>Prix unitaire</label> : <input type='text' name='prix' /></p>
					<p><label>Lien vers site marchand</label> : <input type='url' name='lien' /></p>
					<p><label>Image du produit</label> : <input type='file' name='image' /></p>
					<p><label>Date de demande</label> : <input type='date' name='date' /></p>
					<p><label>Mail pour suivi de l'avancement</label> : <input type='mail' name='mail' /></p>
					<br>
					<input type='submit' id='submit2' value='Ajouter'>
				
			</form>
		</fieldset>
		
		</div>
		</div>
		</div>
		<div id="footer">
			<div id="credits">
			<br>Site réalisé par Adrien Simard, Roshan Nepaul, Kévin Fanton et Yoann Raguenes</br>
			<br> Etudiants en 3ème année de la filière IDU de Polytech Annecy-Chambéry</br>
			</div>
			</div>
		
	</body>
</html>	














