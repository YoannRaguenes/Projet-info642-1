<?php
    
    include('connect_bdd.php');
    session_start();
    $mail = $_SESSION['email'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
?>    
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="messagerie.css"  type="text/css" />
        <title>Mini-chat</title>
    </head>
    <body>
    <p>
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
    <div id="envoie_message">

        <div id= "formul">
           
            <form action="messagerie_post.php" method="post">
                 <fieldset>
                    <legend>Messagerie de <?= $nom ?> <?= $prenom ?> </legend>
                    <p>
                    <label for="email_envoie">Votre adresse mail</label> : <input type="text" name="email_envoie" value = <?= $mail ?> required= "" /><br />

                    <label for="email_recu">Destinataire</label> : <input type="text" name="email_recu" placeholder="Son adresse mail" required="" /><br />
                    
                    <label for="message">Votre Message</label> :  <input type="text" name="message" id="message" required="" /><br />

                


                    <input type="submit" name="insertion" value="Envoyer le message" />
            	    </p>
                    <?php 
                        if (isset($_SESSION['id_prof']))
                        {
                           echo "<a href ='accEnseignant.php'> Retour à l'acceuil</a>";

                        }
                        if (isset($_SESSION['id_etud']))
                        {
                            echo "<a href ='accEtudiant.php'> Retour à l'acceuil</a>";
                        }

                        if (isset($_SESSION['id_serv']))
                        {
                            echo "<a href ='accTechnicien.php'> Retour à l'acceuil</a>";    
                        }
                    ?>
                </fieldset>
            </form>
        </div>
    </div>

    <div id ="affichage_message">
        <div id="formul2">
            <form method="post" action ="messagerie_post.php">
                <fieldset>
                    <legend>Suppression des messages</legend>
                    <p><b>Réponse faite à : </b></p> 
                    <input type="number" name="id_reponse" id="id_reponse" />
                    <input type="submit" name='suppression' value='Supprimer le message' >
                </fieldset>
            </form>
           
        <?php

             $sql= $base->prepare("SELECT id,email,message FROM messagerie WHERE destinataire = '$mail' ORDER BY ID ASC LIMIT 0,10");
             $sql->execute();
             
             $sql_count = $sql ->rowCount();

             if($sql_count == 0)
             {
                echo "Aucun message";
             }
             else
            {
                while ($msg = $sql ->fetch())
                {
                    echo '<p> Message numéro  <strong>'. htmlspecialchars($msg['id']) . '</strong> de <strong>' . htmlspecialchars($msg['email']) . '</strong> : ' . htmlspecialchars($msg['message']);

                }


                        
            }


        ?>
        </div>
    </div>    
    </body>
</html>