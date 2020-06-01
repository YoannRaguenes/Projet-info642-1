<html>
    <head>
	
       <meta charset="utf-8">
        <link rel="stylesheet" href="qcm.css"  type="text/css" />
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
			 
      <form method="post">
        <fieldset>
          <legend>Enquête de satisfaction</legend>

   <p >
       Votre navigation sur le site web :<br />
       <label><input type="radio" name="avis1" value="Insatisfaisante" id='formul' />Insatisfaisant</label><br />
       <label><input type="radio" name="avis1" value="Peu satisfaisante" />Peu satisfaisant</label><br />
       <label><input type="radio" name="avis1" value="Satisfaisante" />Satifaisant</label><br />
       <label><input type="radio" name="avis1" value="Très satisfaisante" />Très satisfaisant</label>
   </p>
   <p >
       Le résultat de votre commande était :<br />
       <label><input type="radio" name="avis2" value="Insatisfaisant" />Insatisfaisant</label><br />
       <label><input type="radio" name="avis2" value="Peu satisfaisant" />Peu satisfaisant</label><br />
       <label><input type="radio" name="avis2" value="Satisfaisant" />Satifaisant</label><br />
       <label><input type="radio" name="avis2" value="Très satisfaisant" />Très satisfaisant</label>
   </p>
    <p >
       Explications :<br />
       <textarea type='text' name='description'></textarea><br />

   </p>
   <input type="submit" value="Valider" id='submit2'/>
   </fieldset>
</form>
<?php 
include("connect_bdd.php");
if(isset($_POST['avis1']) && isset($_POST['avis2']) && isset($_POST['description'])){
$avis1 = $_POST['avis1'];
$avis2 = $_POST['avis2'];
$descri = $_POST['description'];
$sql= "INSERT INTO `avis`( `satisfaction_web`, `satisfaction_commande`, `explication`) VALUES ('$avis1','$avis2','$descri')";
$sth = $base->prepare($sql);
$sth->execute();
}
?>			
		
		
	</div>
		
		<div id="footer">
			<div id="credits">
			<br>Site réalisé par Adrien Simard, Roshan Nepaul, Kévin Fanton et Yoann Raguenes</br>
			<br> Etudiants en 3ème année de la filière IDU de Polytech Annecy-Chambéry</br>
			</div>
			</div>
		
	</body>
</html>	
