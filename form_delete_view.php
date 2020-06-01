<!DOCTYPE HTML>

<html>

  <head>
    <title>Suppression de compte</title>
    <meta content="info">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin.css" />
  </head>
  
  <body id='fond'>
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
    <legend> Suppression de compte </legend>

       <p>
       Veuillez indiquer si la personne est :<br />
       <input type="radio" name="role" value="etu" id="etu" /> <label for="etu">Etudiant</label><br />
       <input type="radio" name="role" value="enseignant" id="enseignant-25" /> <label for="enseignant-25">Enseignant</label><br />
       <input type="radio" name="role" value="service" id="service" /> <label for="service">Du service Technique</label><br />
       </p>



       <p><label for="email">Email :</label>
       <input type="email" name="email" id="email" /></p>

        
       <input type="submit" value="Suprrimer" />

       <a href = "form_inscript.php">Créer un compte </a>
   </fieldset>
       </form>

</div>


  
  </body>
</html> 
