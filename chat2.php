<?php
	include "db.php";
	session_start();

	function Tronquerdate_publication($date_publication){
		return date('d/m/y | G:i', strtotime($date_publication));
	}


	if(isset($_GET['id']) AND $_GET['id'] > 0){
		$getid = intval($_GET['id']);
		$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
		$requser->execute(array($getid));
		$userinfo = $requser->fetch();
?>

<html>
<head>
		<link rel="shortcut icon" href="images/logotitle.ico" />
	<title>Tintin - Chat</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/chat.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body onload="ajax();">

<?php
	if (isset($_SESSION['id']) AND $_SESSION['id'] == $getid){
		if(isset($_POST['message']) AND !empty($_POST['message'])){
			$pseudo = $_SESSION['pseudo'];
			$id = $_SESSION['id'];
			$message = htmlspecialchars($_POST['message']);

			$insertmsg = $bdd->prepare('INSERT INTO chat (id_pseudo, message) VALUES (?, ?)');
			$insertmsg->execute(array($id, $message));
		}
?>

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
                <li class="item last"><a href="chat2.php">Chat</a></li>
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

	<div id="content">
		<div id="content-chat">
			<div id="chat" onload="move">
				<?php
				
					$allmsg = $bdd->query("SELECT * FROM chat ORDER BY id DESC LIMIT 0, 20");

					while ($msg = $allmsg->fetch()){

						$reqsender = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
						$reqsender->execute(array($msg['id_pseudo']));
						$senderinfo = $reqsender->fetch();


						$emoji_replace = array(':)',':-)', '(angry)',':3',":'(",':|',':(',':-(',';)',';-)');
						$emoji_new = array('<img src="images/emojis/emo_smile.png">','<img src="images/emojis/emo_smile.png">','<img src="images/emojis/emo_angry.png">','<img src="images/emojis/emo_cat.png">','<img src="images/emojis/emo_cry.png">','<img src="images/emojis/emo_noreaction.png">','<img src="images/emojis/emo_sad.png">','<img src="images/emojis/emo_sad.png">','<img src="images/emojis/emo_wink.png">','<img src="images/emojis/emo_wink.png">');
						$msg['message'] = str_replace($emoji_replace, $emoji_new, $msg['message']);
				?>


						<?php

						if ($msg['id']%2 == 0) {
						?>
							<div id="message-chat-right">
								<img src="membres/avatars/<?php echo $senderinfo['avatar'];?>" alt="<?php echo $senderinfo['pseudo'];?>" class="left">
								<p class="pseudo">| <?php echo $senderinfo['pseudo'];?> | </p>
								<p><?php echo $msg['message']; ?></p>
								<span class="time-right"><?php echo Tronquerdate_publication($msg['date_publication']); ?></span>
							</div>

						<?php
						}else{
						?>
						<div id="message-chat-left">
							<img src="membres/avatars/<?php echo $senderinfo['avatar'];?>" alt="<?php echo $senderinfo['pseudo'];?>" class="right">
							<p class="pseudo">| <?php echo $senderinfo['pseudo'];?> | </p>
							<p><?php echo $msg['message']; ?></p>
							<span class="time-left"><?php echo Tronquerdate_publication($msg['date_publication']); ?></span>
						</div>





				<?php
						}
					}
				?>
			</div>
		</div>
		<form method="POST" action="">
			<textarea name="message" placeholder="message"></textarea>
			<input type="submit" value="Envoyer" name="envoyer">
		</form>
	</div>

	<script>
		setInterval('load_messages()', 500);
		function load_messages(){
			$('#chat').load('chat.php');
		}
	</script>
<?php
	}else{
		header("Location: conexioninscription.php?id=2&space=1");
	}
?>
      <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>
<?php
	}else{
		header("Location: conexioninscription.php?id=2&space=1");
	}
?>