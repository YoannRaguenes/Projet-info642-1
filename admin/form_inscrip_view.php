<!DOCTYPE HTML>

<html>

  <head>
    <title>Création de compte</title>
    <meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin.css" />
  </head>
  
  <body>
       <p id=titre>
      <?php 
                    if(isset($erreur))
                    {
                        echo '<span style="color:red">'.$erreur.'</span>';
                    }
                    elseif (isset($ok)) {
                      echo '<span style="color:green">'.$ok.'</span>';
                    }
                    else 
                    {
                        echo'<br />';
                    }    
      ?>
    </p>

 <div id = compte>

 	
<form method="POST" id = formul>
	<fieldset>
 		<legend> Création de compte </legend>

       <p>
       Veuillez indiquer si la personne est :<br />
       <input type="radio" name="role" value="etudiant" id="etudiant" /> <label for="etudiant">Etudiant</label><br />
       <input type="radio" name="role" value="enseignant" id="enseignant" /> <label for="enseignant">Enseignant</label><br />
       <input type="radio" name="role" value="service" id="service" /> <label for="service">Du service Technique</label><br />
       </p>

       <p><label for="nom">Nom (en majuscule) :</label>
       <input type="text" name="nom" id="nom" /></p>

       <p><label for="prenom">Prénom :</label>
       <input type="text" name="prenom" id="prenom" /></p>

       <p><label for="classe">classe ou département :</label>
       <input type="text" name="classe" id="classe" /></p>


       <p><label for="email">Email :</label>
       <input type="email" name="email" id="email" /></p>

       <p><label for="numero">Numero Etudiant:</label>
       <input type="text" name="numero" id="numero" /></p>
 
        
       <input type="submit" value="Valider" />

       <a href = "form_delete.php">Supprimer un compte </a>
   </fieldset>
       </form>

</div>


  
  </body>
</html> 
