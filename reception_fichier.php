<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        echo 'good';
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
                echo 'good';
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'txt');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // on enlève les accents et cractère spéciaux du nom
                        $fichier = basename($_FILES['monfichier']['name']);
                        $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploaded/' . $fichier);
                        echo "L'envoi a bien été effectué !";
                        $chemin = 'uploaded/' . $fichier ;
                        header('Location:'.$chemin);

                         
                
                }
        }
}

?>