 <?php
 include('connect_bdd.php');

    function passgen2($nbChar)
    {
          return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $nbChar);
    }


    if(isset($_POST['nom']) && isset($_POST['email'])&& isset($_POST['role']))
    {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {

                    	$nom = $_POST['nom'];
                      $prenom = $_POST['prenom'];
                    	$email = $_POST['email'];
                    	$mpd = passgen2(10);


                //Verification si l'email est deja dans la bdd personne
                $mail_exist = $base->prepare('SELECT id_personne FROM personne WHERE email = ?');
                $mail_exist->execute(array($email));
                $mail_verif_exist = $mail_exist->rowCount();

                if($mail_verif_exist == 1)
                {
                       $erreur = "Adresse mail deja existante .";
                }
                else
                {
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

                      if($_POST['role']=='etu')
                      {
                        $req = $base->prepare("INSERT INTO `etudiant`( `classe`,`id_perso`, numero) VALUES (?,?,?)");
                        $req->execute(array($_POST['classe'],$id_personne, $_POST['numero']));
                      }
                      elseif ($_POST['role']== 'enseignant') 
                      {

                        $req = $base->prepare("INSERT INTO `enseignant`(`departement`, `id_pers`) VALUES (?,?)");
                        $req->execute(array($_POST['classe'], $id_personne));
                        
                      }
                      else
                      {

                          $req = $base->prepare("INSERT INTO `service_technique`(`departement`, `id_person`) VALUES (?,?)");
                          $req->execute(array($_POST['classe'],$id_personne));

                      }
          
                        $dest = $email;
                        
                        $sujet = "Création de votre compte ";
                        $corps = "Bonjour, votre compte a été créer par l'administrateur, votre mot de passe est: " . $mpd;
                        $headers = "From: adriensimard05@gmail.com";

                        if(mail($dest, $sujet, $corps, $headers))
                        {
                          echo "Email envoyé avec succès";
                        }
                

                }
        }
        else
        {
            $erreur = "adresse mail invalide";
        }

    }

  require_once('form_inscrip_view.php');


      ?>