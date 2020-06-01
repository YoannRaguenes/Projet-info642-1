<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="index.css"  type="text/css" />
    </head>
    <body>
    
        <div id="connexion">
            
    		<div id= "formul">
	            <form  method="POST">

	            	<fieldset>
		                <legend>Connexion</legend>
		                
		                <p><label><b>Email</b></label><br/>
		                <input type="text" placeholder="Entrer votre email" name="email" required=""  ></p>

		                <p><label><b>Mot de passe</b></label><br/>
		                <input type="password" placeholder="Entrer le mot de passe" name="password" required=""  ></p>

		                <input type="checkbox" name ="rememberme"  id="onclick"/> <label for="onclick"><b>Se souvenir de moi</b></label>
		                <input type="submit" name='verif_conex' value='Connexion' >


		            </fieldset>
	                
	            </form>
	           	<?php 
	            	if(isset($erreur))
	            	{
	            		echo '<span style="color:red">'.$erreur.'</span>';
	            	}
	            	else 
	            	{
	            		echo'<br />';
	            	}	
	            ?>
	            
	            <p>
	            <a  href="envoiemail.php">Mot de passe oublié ?</a>
	            <div id = "logo">
    			 	<img src="images\logoPOPO.jpg" alt="" />
    			</p>
    			</div>

	        </div>

	        
        </div>
    </body>
</html>
