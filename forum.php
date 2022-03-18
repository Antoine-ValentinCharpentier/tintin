      <?php
          function Tronquerdate_publication($date_publication){
            return date('d/m/y à G:i', strtotime($date_publication));
          }
      ?>
<?php
	include "db.php";
	session_start();

  if(!isset($_SESSION['id'])){
    header("Location: conexioninscription.php?id=2&space=2");
  }


	if(isset($_SESSION['id'])){
		$requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
 	  $requser->execute(array($_SESSION['id']));
	  $user = $requser->fetch();

    if(isset($_POST['submitpost'])){
      if(!empty($_POST['post'])){ 
        $categorie = htmlspecialchars($_POST['cate']);
        $sujet = htmlspecialchars($_POST['name']);
        $post = htmlspecialchars($_POST['post']);
        $sender = htmlspecialchars($_SESSION['id']);

        $reqsujet = $bdd->prepare("SELECT * FROM forumsujet WHERE name = ? AND categorie = ?");
        $reqsujet->execute(array($sujet, $categorie));
        $sujetexist = $reqsujet->rowCount();

        $reqcate = $bdd->prepare("SELECT * FROM forumcategories WHERE name = ?");
        $reqcate->execute(array($categorie));
        $cateexist = $reqcate->rowCount();

        if ($sujetexist != 0 AND $cateexist != 0) {
          $requete = $bdd->prepare('INSERT INTO forumpost(propri,contenu,date,sujet,categorie) VALUES( ?, ?,NOW(), ?, ?)');
          $requete->execute(array($sender, $post, $sujet, $categorie));


          /**ajout +1 nbpost**/
          $_SESSION['nbpost'] = $_SESSION['nbpost']+1;

          $insertnbpost = $bdd->prepare("UPDATE membres SET nbpost = ? WHERE id = ?");
          $insertnbpost->execute(array($_SESSION['nbpost'], $_SESSION['id']));
        }else{
          header("Location: forum.php");
        }
      }else{
        $erreur = "Votre message n'a pas pu être envoyé, ce dernier est vide.";
      }
    }

?>
<html>
<head>
    <link rel="shortcut icon" href="images/logotitle.ico" />
	<title>Tintin - Forum</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <link type="text/css" rel="stylesheet" href="css/menu.css" />
  <link rel="stylesheet" type="text/css" href="css/forum.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

  <?php
  if(isset($_GET['categorie']) OR isset($_GET['sujet'])){
  ?>
  <style type="text/css">
    #forum{
      padding: 0;
      width: 80%;   
      margin: 0 auto;
      background-color: #3d3d3d;
      border:  0.40em solid #ccc;
      border-radius: 5px;
      position: relative;
      top: 100px;
      padding-bottom: 1%;
    }


  </style>
  <?php
  }else{
  ?>
  <style type="text/css">

    #forum{
      padding: 0;
      width: 80%;   
      margin: 0 auto;
      background-color: #3d3d3d;
      border:  0.40em solid #ccc;
      border-radius: 5px;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      padding-bottom: 1%;
    }
  </style>
    <?php
  }
  ?>
</head>
<body>

      <header>
        <img src="images/logoSite.png" id="logo">
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

            <div id="forum">
                <?php 

                if(isset($_GET['categorie']) AND !isset($_GET['sujet'])){ /*SI on est dans une categorie + VERIFIER SI LA CATEGORIE EXISTE sinon quitter le mode catégorie*/
                  $reqcategorie = $bdd->prepare("SELECT * FROM forumcategories WHERE name = ?");
                  $reqcategorie->execute(array($_GET['categorie']));
                  $categorieexist = $reqcategorie->rowCount();

                  if($categorieexist != 0){
                    $categorie2 = htmlspecialchars($_GET['categorie']);
                    ?>

                    <p class="nomcategorie"><?php echo $categorie2;?></p>

                    <a href="addSujet.php?categorie=<?php echo $categorie2; ?>">Ajouter un sujet</a>

                    <?php 
                        $requete = $bdd->prepare('SELECT * FROM forumsujet WHERE categorie = ?');
                        $requete->execute(array($categorie2));

                        while($reponse = $requete->fetch()){
                           $reqpost = $bdd->prepare("SELECT * FROM forumpost WHERE sujet = ? AND categorie = ?");
                           $reqpost->execute(array($reponse['name'], $_GET['categorie']));
                           $nbpost = $reqpost->rowCount();

                            ?>

                            <div class="sujetmenu">
                              <div class="gauche"><a href="forum.php?sujet=<?php echo $reponse['name']."&categorie=".$_GET['categorie'] ?>"><?php echo $reponse['name'] ?></a></div>
                              <div class="droite">
                                  <p class="subtitle">Crée le</p>
                                  <p class="date"><?php echo "Le ".Tronquerdate_publication($reponse['date_creation']);?></p>
                              </div>                              
                              <div class="middle">
                                  <p class="subtitle">Nombre de post</p>
                                  <p class="date"><?php echo $nbpost;?></p>
                              </div>
                            </div>    
                            <?php
                        }
                                       
                  }else{
                    header("Location: forum.php");
                  }
  
                }else if(isset($_GET['sujet']) AND isset($_GET['categorie'])){ /*SI on est dans un sujet + VERIFIER SI LE SUJET EXISTE sinon quitter le mode sujet et aller au mode catégorie*/

                  $reqsujet = $bdd->prepare("SELECT * FROM forumsujet WHERE name = ? AND categorie = ?");
                  $reqsujet->execute(array($_GET['sujet'], $_GET['categorie']));
                  $sujetexist = $reqsujet->rowCount();

                  $reqcate = $bdd->prepare("SELECT * FROM forumcategories WHERE name = ?");
                  $reqcate->execute(array($_GET['categorie']));
                  $cateexist = $reqcate->rowCount();

                  if($sujetexist != 0 AND $cateexist != 0){
                    $sujet2 = htmlspecialchars($_GET['sujet']);
                    $cate2 = htmlspecialchars($_GET['categorie']);
                    ?>

                    <p class="nomsujet"><?php echo $_GET['sujet']; ?></p>
                
                    <?php 

                    $requete = $bdd->prepare('SELECT * FROM forumpost WHERE sujet = ? AND categorie = ?');
                    $requete->execute(array($_GET['sujet'], $_GET['categorie']));

                    while($reponse = $requete->fetch()){
                    ?>
                    
                      <div class="post">
                        <?php 
                        $requete2 = $bdd->prepare('SELECT * FROM membres WHERE id = :id');
                        $requete2->execute(array('id'=>$reponse['propri']));
                        $membres = $requete2->fetch();
                        echo '<p class="pseudo">| '.$membres['pseudo'].' |</p>';
                     
                        echo '<p class="message">'.$reponse['contenu'].'</p>';
                        ?>
                      </div> 

                    <?php
                    }
                    ?>
                
                 <form method="post" action="">
                        <textarea name="post" placeholder="Votre message..." ></textarea>
                        <input type="hidden" name="name" value="<?php echo $_GET['sujet']; ?>" />
                        <input type="hidden" name="cate" value="<?php echo $_GET['categorie']; ?>" />
                        <input type="submit" name="submitpost" value="Ajouter à la conversation" />
                        <?php 
                        if(isset($erreur)){
                            echo '<p class="erreur">'.$erreur.'</p>';
                        }
                        ?>
                  </form>

                    <?php
                  }else{
                    header("Location: forum.php");
                  }
                }
                else { /*Si on est sur la page normal*/
                    
                    $requete = $bdd->query('SELECT * FROM forumcategories');
                    while($reponse = $requete->fetch()){
                           $reqsujet = $bdd->prepare("SELECT * FROM forumsujet WHERE categorie = ?");
                           $reqsujet->execute(array($reponse['name']));
                           $nbsujet = $reqsujet->rowCount();

                           $reqpost = $bdd->prepare("SELECT * FROM forumpost WHERE categorie = ?");
                           $reqpost->execute(array($reponse['name']));
                           $nbpost = $reqpost->rowCount();
                      ?>
                      <div class="categories">
                            <div class="gauche">
                              <a href="forum.php?categorie=<?php echo $reponse['name']; ?>"><?php echo $reponse['name']; ?></a>
                            </div> 
                             <div class="droite">
                                  <p class="subtitle">Nombre de post</p>
                                  <p class="date"><?php echo $nbpost; ?></p>
                              </div>                              
                              <div class="middle">
                                  <p class="subtitle">Nombre de sujet</p>
                                  <p class="date"><?php echo $nbsujet; ?></p>
                              </div>
                            </div> 
                      
                
                    <?php 
                    }
                    ?></div><?php
                }
                 ?> 
            </div>

                <br><br>

              <?php
                if(isset($_GET['categorie']) OR isset($_GET['sujet'])){
              ?>
                  <br><br><br><br><br><br>
                  <footer>
                    <div class="background-content-footer">
                      <div class="content-footer">
                        <div class="content-footer-gauche">
                          <img src="images/logoSite.png" class="content-footer-gauche-logo">
                          <br>
                          <ul class="content-footer-gauche-social">
                            <li class="facebook"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></li>
                              <li class="twitter"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></li>
                              <li class="instagram"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></li>
                              <li class="google"><i class="fa fa-google fa-2x" aria-hidden="true"></i></li>
                              <li class="whatsapp"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></li>
                          </ul>
                        </div>
                        <div class="content-footer-droite">
                          <h2 class="content-footer-droite-title">Liens utiles</h2>
                          <a href="index.php?id=1">> A propos de  &lt/ Tintin &gt</a>
            <br>
           <a href="forum.php">> Une question?</a>
                        </div>
                      </div>  

                      <div class="bottom-footer">
                        <p>Copyright 2018 ©  &lt/ Tintin  &gt. Tous droits réservés</p>
                      </div>  
                    </div>
                  </footer>
              <?php
                }
              ?>

      <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>
<?php
	}else{
		header("Location: conexioninscription.php?id=2&space=2");
	}
?>