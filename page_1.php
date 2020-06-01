 <!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="page_1.css" />
        <title>Gestion des commandes</title>
    </head>

<body>
	<h2 id="titre">Ajout d'une demande de matériel</h2>
	<div  id="ajout">
		<div id="form">
			<?php
			session_start();
			include("connexion_base.php");
			?>
			<form action = 'ajout_demande.php' method='post'>
				<fieldset>
					<legend>Ajout Demande</legend>					
					<p><label>Numéro étudiant</label> : <input type='text' name='numero' /></p>
					<p><label>Description du projet</label> : <textarea type='text' name='description'></textarea></p>
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
					<input type='submit' id='submit' value='Ajouter'>
				</fieldset>
			</form>
		</div>
	</div>
</body>
</html>