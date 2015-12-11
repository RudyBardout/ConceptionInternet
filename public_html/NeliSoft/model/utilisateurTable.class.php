<?php

class utilisateurTable
{
  public static function getUserByLoginAndPass($login,$pass)
  {
    $connection = new dbconnection() ;
    $sql = "select * from jabaianb.utilisateur where identifiant='".$login."' and pass='".sha1($pass)."';" ;

    $res = $connection->doQueryObject( $sql, "utilisateur" );

    return $res ;
  }

  public static function getUserById($id)
  {
    $connection = new dbconnection() ;
    $sql = "select * from jabaianb.utilisateur where id = ".$id.";" ;

    $res = $connection->doQueryObject( $sql, "utilisateur" );

    return $res ;
  }

  public static function getUsers()
  {
    $connection = new dbconnection() ;
    $sql = "select * from jabaianb.utilisateur;" ;

    $res = $connection->doQueryObject( $sql, "utilisateur" );

    return $res;
  }

  public static function inscription($context)
  {
    $connection = new dbconnection() ;
    $query="Select identifiant from jabaianb.utilisateur where identifiant='".$context->login."';";
    $res = $connection->doQueryObject( $sql, "utilisateur" );
    if($res === false){
      return false ;
    }
    else if (!empty($res)) {
      return 2;
    }
    else {
      if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0){

        // Testons si le fichier n'est pas trop gros
        if ($_FILES['fichier']['size'] <= 10000000){
          // Testons si l'extension est autorisée
          $infosfichier = pathinfo($_FILES['fichier']['name']);
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
          $imgPath = $_POST["nom"].$_POST["prenom"].".".$extension_upload;

          if (in_array($extension_upload, $extensions_autorisees)){

            // On peut valider le fichier et le stocker définitivement
            move_uploaded_file($_FILES['fichier']['tmp_name'], "/home/etudiants/inf/uapv1403233/public_html/img/".$context->nom.$context->prenom.".".$extension_upload);
            chmod('/home/etudiants/inf/uapv1403233/public_html/img/'.$_POST["nom"].$_POST["prenom"].".".$extension_upload , 0755);
            echo "<img src=/~uapv1403233/img/".$context->nom.$context->prenom.".".$extension_upload." />";
            $query = "INSERT INTO jabaianb.utilisateur (nom, prenom, identifiant, pass, avatar) VALUES ('".$context->nom."', '".$context->prenom."', '".$context->login."', '".$context->pass."', '".$imgPath."');";
            $res = $connection->doExec( $query );
            if($res === false){
              echo "Une erreur est survenue !";
            }

            }else{
              echo "erreur extension";
            }

        }else{
          echo "erreur taille";
        }

      }else{
        echo "erreur reception";
      }
    }
  }
      
}
?>
