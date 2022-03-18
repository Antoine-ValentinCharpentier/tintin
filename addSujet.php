<?php session_start();
include "db.php";

if(!isset($_SESSION['id'])){
  header("Location: conexioninscription.php?id=2&space=2");
}

if(isset($_POST['name']) AND isset($_POST['sujet'])){
    
    if (!empty($_POST['name']) AND !empty($_POST['sujet'])) {

        $categorie = htmlspecialchars($_POST['categorie']);
        $sujet = htmlspecialchars($_POST['name']);
        $contenu = htmlspecialchars($_POST['sujet']);

        $reqsujet = $bdd->prepare("SELECT * FROM forumsujet WHERE name = ? AND categorie = ?");
        $reqsujet->execute(array($sujet, $categorie));
        $sujetexist = $reqsujet->rowCount();

        if($sujetexist == 0){
            $sujetlength = strlen($sujet);
            if ($sujetlength <= 255) {
                $requete = $bdd->prepare('INSERT INTO forumsujet(name,categorie) VALUES(?, ?)');
                $requete->execute(array($sujet, $categorie));
                
                $requete2 = $bdd->prepare('INSERT INTO forumpost(propri,contenu,date,sujet, categorie) VALUES( ?, ?, NOW(), ?, ?)');
                $requete2->execute(array($_SESSION['id'],$contenu, $sujet, $categorie));
                header("Location: forum.php?sujet=".$sujet."&categorie=".$categorie);

                /** ajout profil +1 nbsujet**/
                     $_SESSION['nbsujet'] = $_SESSION['nbsujet']+1;

                     $insertnbsujet = $bdd->prepare("UPDATE membres SET nbsujet = ? WHERE id = ?");
                     $insertnbsujet->execute(array($_SESSION['nbsujet'], $_SESSION['id']));


                  /** **/
            }else{
                $erreur = "Le nom du sujet est trop long, il ne doit pas dépasser 255 caractères.";
            }
        }else{
            $erreur = "Ce sujet existe déjà dans cette catégorie.";
        }

    }else{
        $erreur = "Tout les champs n'ont pas étaient remplit.";
    }
    
}


?>
<head>
    <link rel="shortcut icon" href="images/logotitle.ico" />
    <meta charset='utf-8' />
    <title>Tintin - Forum | Ajout Sujet</title>
    <link rel="stylesheet" type="text/css" href="css/forum.css" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
      <link type="text/css" rel="stylesheet" href="css/menu.css" />
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
                }
          
      </style>

<head>
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
                <p class="nomcategorie">Ajouter un sujet</p>
                
                <form method="post" action="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>">
                    <p>
                        <br><input type="text" name="name" placeholder="Nom du sujet..." class="inputsujetname" /><br>
                        <textarea name="sujet" placeholder="Contenu du sujet..."></textarea><br>
                        <input type="hidden" name="categorie" value="<?php echo $_GET['categorie']; ?>" />
                        <input type="submit" value="Ajouter le sujet" class="sendsujet" />
                        <?php 
                        if(isset($erreur)){
                            echo '<p class="erreur">'.$erreur.'</p>';
                        }
                        ?>
                    </p>
                </form>
            </div>
</body>
</html>
