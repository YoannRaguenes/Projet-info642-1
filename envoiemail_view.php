

<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="index.css"  type="text/css" />
    </head>
    <body>
    
        <div id="connexion">
            
    		<div id= "formul">
    			<?php if($section =='code')
    				 {?>
    				 <form method="POST">

			            <fieldset>

				            <legend>Récupération de mot de passe</legend>

				            <p><label><b><?= $_SESSION['recup_mail'] ?></b></label><br/>
				            <span style="color:green"> Un code vous a été envoyez par mail (Verifier les spams) </span>
				            <input type="text" placeholder="Code de vérification" name="verif_code" ></p>
							<input type="submit" name='verif_submit' value='Valider' >

				        </fieldset>
			             
			        </form>

    			<?php } elseif($section=='changemdp')
    					 { ?>
    					 	<form method="POST">

			            		<fieldset>

						            <legend>Nouveau mot de passe</legend>

						            <p><label><b><?= $_SESSION['recup_mail'] ?></b></label><br/>
						            <input type="password" placeholder="Nouveau mot de passe " name="change_mdp" ></p>
						            <input type="password" placeholder="Confirmation mot de passe" name="change_mdpc" ></p>
									<input type="submit" name='change_submit' value='Valider' >

				        		</fieldset>
			             
			       			 </form>

    					 <?php }

    			 else { ?>
			            <form method="POST">

			            	<fieldset>
				                <legend>Mot de passe oublié</legend>

				                <p><label><b>Adresse mail</b></label><br/>
				                <input type="email" placeholder="Votre adresse mail" name="recup_mail" required="" ></p>
				                <input type="submit" name='recup_valider' value='Rénitialiser' >

				            </fieldset>
			                

			            </form>
	            <?php } ?>
	            <p>
	            <?php 
	            	if(isset($error))
	            	{
	            		echo '<span style="color:red">'.$error.'</span>';
	            	} else {
	            		echo'<br />';
	            		 	}
	            ?>
	            </p>
	            <a href="connexion.php">Retour à la page de connexion</a>
	            <div id = "logo">
    			 	<img src="images\logoPOPO.jpg" alt="" />
    			</div>

	        </div>


        </div>
    </body>
</html>
