


<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href="complete_demande.css"  type="text/css" />
    </head>
    <body>
	
		<div id="entete">
		
			<div id="cadreConnec">
			Nom d'utilisateur
			<p><a href="deconnexion.php">Se déconnecter</p></a>
			</div>		
		
			<div id="Bienvenue">
			<h2>Bienvenue sur la plateforme de commande de matériel</h2>
			</div>
		
			
			
		</div>
		

		<div id="main">
			<div id="menu">
			<input type="submit" id='submit'onclick=window.location.href='complete_demande.php' value='DEMANDES EN ATTENTE' >
			<input type="submit" id='submit' value='DEMANDES TRAITEES' >
			<input type="submit" id='submit' value='CONTACTER UN TECHNICIEN' >
			<input type="submit" id='submit' value='CONTACTER UN ELEVE' >
			<input type="submit" id='submit' value='ENQUETE DE SATISFACTION' >
			
			</div>
			
			

		<div id="contenu">
			<div id="formulaire1">
			</style>
			

			<div id="modif">
			<body id="titre">
				
			<h2>Complement des demandes</h2>	
			<?php
			session_start();
			$nom = "CIMPAN";
			include("connect_bdd.php");
			$sql =  "SELECT *
			FROM demande_materiel WHERE enseignant = '$nom'";
			$sth = $base->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll();
			echo "<form action = 'complete.php' method='post'>";
			echo "<label>Demandes</label> : <select name='demande'>";
			foreach ($result as $row) {
			echo "<option>".$row['description'];			}
			echo "</select>"; 
			?>
			</div>

			<div id="consulter1">

			<?php
			echo "<input type='submit1' id='bouton_consul' value='Consulter'>";
			echo "</form>";	

			?>
			</div>
			</div>
			
		</div>
	</div>



		<div id="footer">
		Site réalisé par Adrien Simard, Roshan Nepaul, Kévin Fanton et Yoann Raguenes
		<p> Etudiants en 3ème année de la filière IDU de Polytech Annecy-Chambéry</p>
			
		</div>
	</body>
</html>	