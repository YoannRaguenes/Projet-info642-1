 <?php
 include('connect_bdd.php');




    if(isset($_POST['email'])&& isset($_POST['role']))
    {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {

                    	
                        $email = $_POST['email'];
                    	


                //Verification si l'email est absente de la bdd
                $mail_exist = $base->prepare('SELECT id_personne FROM personne WHERE email = ?');
                $mail_exist->execute(array($email));
                $mail_verif_exist = $mail_exist->rowCount();

                if($mail_verif_exist == 0)
                {
                       $erreur = "Aucun compte n'a cette adresse mail";
                }
                else
                {

					  $sql ="SELECT `id_personne` FROM `personne` WHERE email='$email'";
                      $req =$base->prepare($sql);
                      $req->execute();
                      $result = $req-> fetchAll();
                      $id_personne = $result[0][0];   





                      if($_POST['role']=='etu')
                      {
                        $req = $base->prepare("DELETE FROM etudiant WHERE id_perso = ?");
                        $req->execute(array($id_personne));
                        $ok = "Compte etudiant supprimé ";
                      }
                      elseif ($_POST['role']== 'enseignant') 
                      {

                        $req = $base->prepare("DELETE FROM enseignant WHERE id_pers = ?");
                        $req->execute(array($id_personne));
                        $ok = "Compte enseignant supprimé ";
                        
                      }
                      else
                      {

                          $req = $base->prepare("DELETE FROM service_technique WHERE id_person = ?");
                          $req->execute(array($id_personne));
                          $ok = "Compte service technique supprimé ";

                      } 	

                }
                $req = $base->prepare("DELETE FROM personne WHERE email = ?");
                $req->execute(array($email));

        }
        else
        {
            $erreur = "adresse mail invalide";
        }
    }

    

require_once('form_delete_view.php');


    ?>