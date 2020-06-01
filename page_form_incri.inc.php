<!DOCTYPE HTML>

<html>

  <head>
    <title>Création de compte</title>
    <meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="gestion_batiment.css" />
  </head>
  
  <body id='fond'>
 <div>
 	<h1> Créer un compte </h1>
 	
<form method="POST" action="page_form_incri.inc.php">
	<fieldset>
 		<legend> Coordonnées </legend>

       <p>
       Veuillez indiquer si la personne est :<br />
       <input type="radio" name="role" value="etu" id="etu" /> <label for="etu">Etudiant</label><br />
       <input type="radio" name="role" value="enseignant" id="enseignant-25" /> <label for="enseignant-25">Enseignant</label><br />
       <input type="radio" name="role" value="service" id="service" /> <label for="service">Du service Technique</label><br />
       </p>

       <p><label for="nom">Nom :</label>
       <input type="text" name="nom" id="nom" /></p>

       <p><label for="prenom">Prénom :</label>
       <input type="text" name="prenom" id="prenom" /></p>

       <p><label for="classe">classe ou département :</label> 
       <input type="text" name="classe" id="classe" /></p>


       <p><label for="email">Email :</label>
       <input type="email" name="email" id="email" /></p>
 
  
        
       <input type="submit" value="Valider" />
   </fieldset>
       </form>
    
    
    <?php
    function passgen2($nbChar){
    return substr(str_shuffle(
'abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $nbChar); }
    if(isset($_POST['nom']) && isset($_POST['email'])&& isset($_POST['role'])){

    	$nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
    	$email = $_POST['email'];
    	$mpd = passgen2(10);
    	include('connect_bdd.php');
    	
    	// Hachage du mot de passe 
$pass_hache = password_hash($mpd, PASSWORD_DEFAULT);

// Insertion
$req = $base->prepare("INSERT INTO personne (nom, prenom, email, password) VALUES (?,?,?,?)");
$req->execute(array( $nom, $prenom, $email, $pass_hache));

$sql ="SELECT `id_personne` FROM `personne` WHERE email='$email'";
$req =$base->prepare($sql);
$req->execute();
$result = $req-> fetchAll();
$id_personne = $result[0][0];

if($_POST['role']=='etu'){
$req = $base->prepare("INSERT INTO `etudiant`( `classe`,`id_perso`) VALUES (?,?)");
$req->execute(array($_POST['classe'],$id_personne));
}
elseif ($_POST['role']== 'enseignant') {

$req = $base->prepare("INSERT INTO `enseignant`(`departement`, `id_pers`) VALUES (?,?)");
$req->execute(array($_POST['classe'], $id_personne));
  
}
else{

$req = $base->prepare("INSERT INTO `service_technique`(`departement`, `id_person`) VALUES (?,?)");
$req->execute(array($_POST['classe'],$id_personne));

}

$dest = $email;
$sujet = "Création de votre compte ";
$corps = "Bonjour, votre compte a été créer par l'administrateur, votre mot de passe est: " . $mpd;
$headers = "From: adriensimard05@gmail.com";
if (mail($dest, $sujet, $corps, $headers)) {
  echo "Email envoyé avec succès";
} else {
  echo "Échec de l'envoi de l'email...";
}


    }
    ?>
</div>
  
  </body>
</html> 

  