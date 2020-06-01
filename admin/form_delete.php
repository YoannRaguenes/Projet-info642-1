 <?php
 include('admin_bdd.php');




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
                        //Verification si on est bien étudiant
                        $etu_exist = $base->prepare('SELECT id_perso FROM etudiant WHERE id_perso = ?');
                        $etu_exist->execute(array($id_personne));
                        $etu_verif_exist = $etu_exist->rowCount();
                        if($etu_verif_exist == 1)
                        {
                           $req = $base->prepare("DELETE FROM personne WHERE email = ?");
                           $req->execute(array($email));

                          $req = $base->prepare("DELETE FROM etudiant WHERE id_perso = ?");
                          $req->execute(array($id_personne));
                          $ok = "Compte etudiant supprimé ";
                        }
                        else{
                          $erreur ="Ce compte n'est pas etudiant veuillez recommencer.";
                        }
                      }
                      elseif ($_POST['role']== 'enseignant') 
                      {
                        //Verification si on est bien enseigant
                        $ens_exist = $base->prepare('SELECT id_pers FROM enseigant WHERE id_pers = ?');
                        $ens_exist->execute(array($id_personne));
                        $ens_verif_exist = $ens_exist->rowCount();
                        if($ens_verif_exist == 1)
                        {
                           $req = $base->prepare("DELETE FROM personne WHERE email = ?");
                           $req->execute(array($email));

                          $req = $base->prepare("DELETE FROM enseignant WHERE id_pers = ?");
                          $req->execute(array($id_personne));
                          $ok = "Compte enseignant supprimé ";
                        }
                        else{
                          $erreur = "Ce compte n'est pas enseigant veuillez recommencer.";
                        }
                      }
                      else
                      {
                        //Verification si on est bien enseigant
                        $st_exist = $base->prepare('SELECT id_person FROM service_technique WHERE id_person = ?');
                        $st_exist->execute(array($id_personne));
                        $st_verif_exist = $st_exist->rowCount();
                        if($st_verif_exist == 1)
                        {
                           $req = $base->prepare("DELETE FROM personne WHERE email = ?");
                           $req->execute(array($email));

                          $req = $base->prepare("DELETE FROM service_technique WHERE id_person = ?");
                          $req->execute(array($id_personne));
                          $ok = "Compte service technique supprimé ";
                        }
                        else{
                          $erreur ="Ce compte n'est pas du service technique veuillez recommencer.";
                        }
                      } 	

                }
               
        }
        else
        {
            $erreur = "adresse mail invalide";
        }
    }

    

require_once('form_delete_view.php');


    ?>