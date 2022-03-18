<?php
session_start();

include "db.php";

if (!isset($_SESSION['id'])) {
   header("Location: conexioninscription.php?id=2");
}

if(isset($_SESSION['id'])) {

   if(isset($_POST['retour'])){
      header("Location: profil.php?id=1");
   }

   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();


   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo'])AND isset($_POST['newpseudo2']) AND !empty($_POST['newpseudo2']) AND $_POST['newpseudo'] != $user['pseudo']) {
      if($_POST['newpseudo'] == $_POST['newpseudo2']){
         $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
         $reqpseudo->execute(array($_POST['newpseudo']));
         $pseudoexist = $reqpseudo->rowCount();
         if($pseudoexist == 0){
            if($user['motdepasse'] == sha1($_POST['newmdp3'])){
               $pseudolength = strlen(htmlspecialchars($_POST['newpseudo']));
               if ($pseudolength <= 255) {
                  $newpseudo = htmlspecialchars($_POST['newpseudo']);
                  $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
                  $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
                  if($insertpseudo){
                        $_SESSION['pseudo'] = $_POST['newpseudo'];
                  }else{
                     $msg = "Une erreur est survenue, veuillez réesayer plus tard.";
                  }
               }else{
                  $msg = "Votre nouveau pseudo est trop long, il doit faire au maximum 255 caractères.";
               }
            }else{
               $msg = "Veuillez rentrer votre mot de passe actuel.";
            }
         }else{
            $msg = "Ce pseudo est déjà utilisé.";
         }
      }else{
         $msg = "Les deux pseudos ne sont pas identiques.";
      }
   }


   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND isset($_POST['newmail2']) AND !empty($_POST['newmail2']) AND $_POST['newmail'] != $user['mail']) {
      if($_POST['newmail'] == $_POST['newmail2']){
         $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
         $reqmail->execute(array($_POST['newmail']));
         $mailexist = $reqmail->rowCount();
         if($mailexist == 0){
            if($user['motdepasse'] == sha1($_POST['newmdp3'])){
               $maillength = strlen(htmlspecialchars($_POST['newmail']));
               if ($maillength <= 255) {
                  if(filter_var(htmlspecialchars($_POST['newmail']), FILTER_VALIDATE_EMAIL)){ 
                     $newmail = htmlspecialchars($_POST['newmail']);
                     $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
                     $insertmail->execute(array($newmail, $_SESSION['id']));
                     if($insertmail){
                           $_SESSION['mail'] = $_POST['newmail'];
                     }else{
                        $msg = "Une erreur est survenue, veuillez réesayer plus tard.";
                     }
                  }else{
                     $msg = "L'adresse saisie n'est pas valide.";
                  }
               }else{
                  $msg = "L'adresse mail saisie est trop longue";
               }
            }else{
               $msg = "Veuillez rentrer votre mot de passe actuel.";
            }  
         }else{
            $msg = "Cette adresse mail est déjà utilisée.";
         }    
      }else{
         $msg = "Les deux adresses mail ne sont pas identiques.";
      }
   }

   if(isset($_POST['description']) AND $_SESSION['description'] != $_POST['description']){
      $description = htmlspecialchars($_POST['description']);
      if($user['motdepasse'] == sha1($_POST['newmdp3'])){
          $lengthdescription = strlen($_POST['description']);
          if($lengthdescription <= 255){
             $insertdescription = $bdd->prepare("UPDATE membres SET description = ? WHERE id = ?");
             $insertdescription->execute(array($description, $_SESSION['id'])); 
             if($insertdescription){
               $_SESSION['description'] = $description; 
               $user['description'] = $description;
             }else{
                  $msg = "Une erreur est survenue lors de l'envoi de votre commentaire, veuillez réesayer plus tard.";
             } 
          }else{
               $msg ="Votre description doit faire moins de 255 caractères.";
          }
      }else{
         $msg ="Veuillez rentrer votre mot de passe actuel";
      }
   }



   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']) AND sha1($_POST['newmdp1']) != $user['motdepasse']) {
      if($_POST['newmdp1'] == $_POST['newmdp2']) {
         if($user['motdepasse'] == sha1($_POST['newmdp3'])){
            if($user['motdepasse'] != sha1($_POST['newmdp1'])){
               $lengthpassword = strlen($_POST['newmdp1']);
               if($lengthpassword <= 255){
                  $mdp1 = sha1($_POST['newmdp1']);
                  $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
                  $insertmdp->execute(array($mdp1, $_SESSION['id']));  

                  if($insertmdp){
                     header('Location: profil.php?id=1');
                  }else{
                     $msg = "Une erreur est survenue, veuillez réesayer plus tard.";
                  }

               }else{
                  $msg = "Votre mot de passe est trop long, il doit être inférieur à 255 caractères.";
               }
            }else{
            
            }
         }else{
            $msg ="Veuillez rentrer votre mot de passe actuel.";
         }
      } else {
         $msg = "Les deux mots de passe ne sont pas identiques.";
      }
   }



   if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
      $taillemax = 25165824; /** bit **/
      $extensionsValides = array('jpg','jpeg','png');
      if($user['motdepasse'] == sha1($_POST['newmdp3'])){


         if($_FILES['avatar']['size'] <= $taillemax){
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

            if(in_array($extensionUpload, $extensionsValides)){

               $chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
               $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
               
               if($resultat){

               /**   on retire les images deja présente au paravant, qui ne seront pas écrasée **/
                  if($extensionUpload == "jpg"){
                     if(file_exists("membres/avatars/".$_SESSION['id'].".jpeg")) unlink ("membres/avatars/".$_SESSION['id'].".jpeg");
                     if(file_exists("membres/avatars/".$_SESSION['id'].".gif")) unlink ("membres/avatars/".$_SESSION['id'].".gif");
                     if(file_exists("membres/avatars/".$_SESSION['id'].".png")) unlink ("membres/avatars/".$_SESSION['id'].".png");
                  }
                  if($extensionUpload == "jpeg"){
                     if(file_exists("membres/avatars/".$_SESSION['id'].".jpg")) unlink ("membres/avatars/".$_SESSION['id'].".jpg");
                     if(file_exists("membres/avatars/".$_SESSION['id'].".gif")) unlink ("membres/avatars/".$_SESSION['id'].".gif");
                     if(file_exists("membres/avatars/".$_SESSION['id'].".png")) unlink ("membres/avatars/".$_SESSION['id'].".png");
                  }
                  if($extensionUpload == "png"){
                     if(file_exists("membres/avatars/".$_SESSION['id'].".jpg")) unlink ("membres/avatars/".$_SESSION['id'].".jpg");
                     if(file_exists("membres/avatars/".$_SESSION['id'].".jpeg")) unlink ("membres/avatars/".$_SESSION['id'].".jpeg");
                     if(file_exists("membres/avatars/".$_SESSION['id'].".gif")) unlink ("membres/avatars/".$_SESSION['id'].".gif");
                  }

                  /**    **/

                  $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
                  $updateavatar->execute(array(
                     'avatar' => $_SESSION['id'].".".$extensionUpload, 'id' => $_SESSION['id']
                     ));

                  $_SESSION['avatar'] = $_SESSION['id'].".".$extensionUpload;

               }else{
                  $msg = "Une erreur est survenue lors de l'envoi de l'avatar !";
               }
            }else{
               $msg = "Votre avatar doit être au format : jpg, jpeg, png";
            }
         }else{
            $msg = "Votre avatar est trop lourd ! Celui-ci ne doit pas dépasser 3 Mo !";
         }
      }else{
         $msg = "Veuillez rentrer votre mot de passe actuel.";
      }
   }



   if(isset($_POST['newmdp3']) AND !empty($_POST['newmdp3']) AND !isset($msg)){
      if ($user['motdepasse'] == sha1($_POST['newmdp3'])) {
         header('Location: profil.php?id=1');
      }else{
         $msg = "Mot de passe actuel incorrect";
      }
   }  

?>

<html>
   <head>
         <link rel="shortcut icon" href="images/logotitle.ico" />
      <title>Tintin - Edition | Profil</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
      <link type="text/css" rel="stylesheet" href="css/menu.css" />
      <link rel="stylesheet" type="text/css" href="css/footer.css">
      <link rel="stylesheet" type="text/css" href="css/editionprofil.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   </head>
   <body>

      <header>
         <img src="images/logoSite.png" id="logo" onload="loadPanel()">
         <div id="hamburger">
            <div id="menu">
               <nav>
                  <ul>
                     <li class="item first"><a href="index.php?id=1">Accueil</a></li>
                     <li class="item"><a href="galerie.php">Galerie</a></li>
                     <li class="item last"><a href="video.php">Vidéo</a></li>
                     <li class="item"><a href="forum.php">Forum</a></li>
                     <?php 
                        if(isset($_SESSION['id'])){
                           ?><li class="item last"><a href="chat2.php?id=<?php echo $_SESSION['id'];?>">Chat</a></li><?php
                        }else{
                           ?><li class="item last"><a href="chat2.php">Chat</a></li><?php
                        }
                     ?>
                  </ul>
               </nav>
               <?php
               if(isset($_SESSION['id'])){
                  ?>
                  <a href="deconnexion.php" class="button inscription">Déconexion</a>
                  <a href="profil.php?id=<?php echo $_SESSION['id'];?>" class="button conexion">Profil</a>  
                  <?php          
               }else{
                  ?>
                  <a href="conexioninscription.php?id=1" class="button inscription">S'inscrire</a>
                  <a href="conexioninscription.php?id=2" class="button conexion">Se connecter</a>
                  <?php
               }
               ?>

            </div>
            <button id="sidebarbutton">&#9776;</button>
            <div id="sidebar">
               <center><img src="images/logoSite.png" id="sidebarheader"></center>
               <div id="sidebarbody"></div>
            </div>
            <div id="overlay"></div>
         </div>
      </header>
   
      <div class="editiondiv">
         <h2>Edition du profil</h2>
         <div class="input">
            
            <div class="gauche">
               <img src="membres/avatars/<?php echo $_SESSION['avatar'];?>" class="logo">
            </div>

            <div class="droite">
               <form method="POST" action="" enctype="multipart/form-data">
                  <p class="titre">Pseudo</p>
                  <p class="profiltext"><input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /></p>
                  <p class="titre">Confrimation Pseudo</p>
                  <p class="profiltext"><input type="text" name="newpseudo2" placeholder="Confirmation Pseudo" value="<?php echo $user['pseudo']; ?>" /></p>
                  <p class="titre">Mail</p>
                  <p class="profiltext"><input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /></p>
                  <p class="titre">Confirmation Mail</p>
                  <p class="profiltext"><input type="text" name="newmail2" placeholder="Confirmation Mail" value="<?php echo $user['mail']; ?>" /></p>
                  <p class="titre">Modifier l'avatar</p>
                  <div class="file-input">
                     <span class="input-value" for="file"><?php echo "C:\ fakepath\ ".$user['avatar']; ?></span>
                     <input class="file" id="file" type="file" name="avatar">     
                  </div>
                  <p class="titre">Commentaire</p>
                  <p class="profiltext"><input type="text" name="description" placeholder="Commentaire" value="<?php echo $user['description']; ?>" /></p>
                  <p class="titre">Mot de passe Actuel</p>
                  <p class="profiltext"><input type="password" name="newmdp3" placeholder="" required="" /></p>
                  <p class="titre">Nouveau Mot de passe</p>
                  <p class="profiltext"><input type="password" name="newmdp1" placeholder=""/></p>
                  <p class="titre">Confirmation -  nouveau mot de passe</p>
                  <p class="profiltext"><input type="password" name="newmdp2" placeholder="" /></p>
                  <br><br>
                  <input type="submit" value="Mettre à jour mon profil !" class="edition2" />                
               </form>
               <form method="POST" action="">
                  <input type="submit" name="retour" value="N'apporter aucune modification" class="edition2">
               </form>
               <?php if(isset($msg)){ ?><p class="erreur"><?php echo $msg;?></p><?php } ?>
            </div>
         </div>
      </div>


      <script type="text/javascript" src="js/menu.js"></script>
         
      <script type="text/javascript">
         $(function(){

            $('.file-input > input').on('change',function(){

               var inputValue = $(this).val();

               $('.input-value').html(inputValue);

            });

         });
      </script>
   </body>
</html>
<?php   
}
else {
   header("Location: conexioninscription.php?id=2");
}
?>