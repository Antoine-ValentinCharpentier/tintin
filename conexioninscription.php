<?php
	session_start();

	include "db.php";

	if(isset($_SESSION['id'])){
		header("Location: index.php?id=".$_SESSION['id']);
	}

	if(isset($_POST['forminscription'])){
		
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mail = htmlspecialchars($_POST['mail']);
		$mail2 = htmlspecialchars($_POST['mail2']);
		$mdp = sha1($_POST['mdp']);
		$mdp2 = sha1($_POST['mdp2']);
		$sexe = htmlspecialchars($_POST['sexe']);

		if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])){

			$pseudolength = strlen($pseudo);

			if($pseudolength <= 255){

				$reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
				$reqpseudo->execute(array($pseudo));
				$pseudoexist = $reqpseudo->rowCount();

				if($pseudoexist == 0){

					$maillength = strlen($mail);

					if($maillength <= 255){

						if($mail == $mail2){ 

							if(filter_var($mail, FILTER_VALIDATE_EMAIL)){ 

								$reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
								$reqmail->execute(array($mail));
								$mailexist = $reqmail->rowCount();

								if($mailexist == 0){

									if($mdp == $mdp2){

											$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse, avatar, sexe, description, nbpost, nbsujet) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
											$insertmbr->execute(array($pseudo, $mail, $mdp, "default.png", $sexe, "", "0", "0"));
											$erreur = "Votre compte a bien été créé ! <a href=\"conexioninscription.php?id=2\">Me connecter</a>";
										    /**header('Location: conexion.php');**/
										
									}else{
										$erreur = "Les deux mots de passe ne sont pas indentiques !";
									}
								}else{
									$erreur = "Cette adresse mail est déjà utilisée !";
								}
							}else{
								$erreur = "Votre adresse mail n'est pas valide !";
							}
						}else{
							$erreur = "Les deux adresses mail inscrites ne sont pas identiques !";
						}
					}else{
						$erreur = "Votre adresse mail ne doit pas dépasser 255 caractères.";
					}
				}else{
					$erreur = "Ce pseudo est déjà utilisé !";
				}
			}else{
				$erreur = "Votre pseudo ne doit pas dépasser 255 caractères.";
			}

		}else{
			$erreur = "Tous les champs doivent être complétés !";
		}
	}
	

	if(isset($_POST['formconnexion'])){
		$mailconnect = htmlspecialchars($_POST['mailconnect']);
		$mdpconnect = sha1($_POST['mdpconnect']);
		$pseudoconnect = htmlspecialchars($_POST['mailconnect']);

		if(!empty($mailconnect) AND !empty($mdpconnect)){

			/**Si c'est le mail qui est utilisé**/
			$requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
			$requser->execute(array($mailconnect, $mdpconnect));
			$userexist = $requser->rowCount();
			/**Si c'est le pseudo qui est utilisé**/
			$requser2 = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
			$requser2->execute(array($pseudoconnect, $mdpconnect));
			$user2exist = $requser2->rowCount();

			if(($userexist == 1) || ($user2exist == 1)){

				if($userexist == 1){
					$userinfo = $requser->fetch();
					$_SESSION['id'] = $userinfo['id'];
					$_SESSION['pseudo'] = $userinfo['pseudo'];
					$_SESSION['mail'] = $userinfo['mail'];
					$_SESSION['avatar'] = $userinfo['avatar'];
					$_SESSION['dateinscription'] = $userinfo['avatar'];
					$_SESSION['dateinscription'] = $userinfo['date_inscription'];
					$_SESSION['sexe'] = $userinfo['sexe'];
					$_SESSION['description'] = $userinfo['description'];
					$_SESSION['nbpost'] = $userinfo['nbpost'];
					$_SESSION['nbsujet'] = $userinfo['nbsujet'];
				}else{
					$userinfo = $requser2->fetch();
					$_SESSION['id'] = $userinfo['id'];
					$_SESSION['pseudo'] = $userinfo['pseudo'];
					$_SESSION['mail'] = $userinfo['mail'];
					$_SESSION['avatar'] = $userinfo['avatar'];
					$_SESSION['dateinscription'] = $userinfo['date_inscription'];
					$_SESSION['sexe'] = $userinfo['sexe'];
					$_SESSION['description'] = $userinfo['description'];
					$_SESSION['nbpost'] = $userinfo['nbpost'];
					$_SESSION['nbsujet'] = $userinfo['nbsujet'];
				}

				if(isset($_GET['space'])){
					if($_GET['space'] == "1"){
						header("Location: chat2.php?id=".$_SESSION['id']);
					}else{
						if($_GET['space'] == "2"){
							header("Location: forum.php?id=".$_SESSION['id']);
						}else{
							header("Location: index.php?id=".$_SESSION['id']);
						}	
					}
				}else{
					header("Location: index.php?id=".$_SESSION['id']);
				}
				
			}else{

				$erreur = "Mail|Pseudo et/ou mot de passe incorrect(s) !";
			}			
		}else{
			$erreur = "Vous n'avez pas rempli tous les champs !";
		}
	}

?>

<!DOCTYPE html>
<html>

	<head>
			<link rel="shortcut icon" href="images/logotitle.ico" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<link type="text/css" rel="stylesheet" href="css/menu.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<link rel="stylesheet" type="text/css" href="css/wrapper.css">
		<link rel="stylesheet" type="text/css" href="css/conexion.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<title>Tintin - Connexion | Inscription</title>

		<script type="text/javascript">
			function loadPanel(){
				var acc1 = document.getElementsByClassName("accordion1");
				var acc2 = document.getElementsByClassName("accordion2");

				var panel1 = acc1[0].nextElementSibling;
				var panel = acc2[0].nextElementSibling;

				<?php
					if(isset($_GET['id']) AND $_GET['id'] == "1"){
				?>	
					panel.style.maxHeight = null;

					panel1.style.maxHeight = panel.scrollHeight + "10"+ "px";
				<?php
					}else{
						if(isset($_GET['id']) AND $_GET['id'] == "2"){
						?>
							panel1.style.maxHeight = null;

							panel.style.maxHeight = panel.scrollHeight + "px";
						<?php
						}else{
							?>
								panel.style.maxHeight = null;
								panel1.style.maxHeight = null;
							<?php
						}
					}
				?>
			}
		</script>
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

		<div class="wrapper">
		<?php
			if(isset($_GET['id']) AND $_GET['id'] == "1"){
		?>
			<button class="accordion1 active" id="accordion1" type="button">Inscription</button>
		<?php
			}else{
				?>
				<button class="accordion1" id="accordion1" type="button">Inscription</button>
				<?php
			}
		?>
			<div class="panel" onload="loadPanel()">
				<div align="center" class="login-box">

					<h1>Inscription</h3>
					<br>

					<form method="POST" action="">
					<div class="textbbox">
						<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}?>" />
					</div>
					<div class="textbbox">					
						<input type="email" placeholder="Votre mail" id="mail" name="mail"  value="<?php if(isset($mail)){echo $mail;}?>"/>	
					</div>
					<div class="textbbox">				
						<input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2"  value="<?php if(isset($mail2)){echo $mail2;}?>"/>	
					</div>	
					<div class="textbbox">
						<p>Vous êtes</p>
						<p>
							<div class="h">
								<label for="sexe"> un Homme</label>
								<input type="radio" name="sexe" id="sexe" value="Homme" checked="checked">						
							</div>
						</p>
						<p>
							<div class="f">
								<input type="radio" name="sexe" id="sexe" value="Femme">
								<label for="sexe"> une Femme</label>	
							</div>						
						</p>
					</div>
					<div class="textbbox">				
						<input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp"/>	
					</div>	
					<div class="textbbox">				
						<input type="password" placeholder="Confirmation mot de passe" id="mdp2" name="mdp2"/>	
					</div>					
					<input type="submit" value="Je m'inscris" name="forminscription" class="btn">
					</form>

					<?php
						if(isset($erreur)){
							echo '<font color="red">'.$erreur."</font>";
						}
					?>

				</div>
			</div>


		<?php
			if(isset($_GET['id']) AND $_GET['id'] == "2"){
		?>
				<button class="accordion2 active" id="accordion2" type="button">Conexion</button>
		<?php
			}else{
				?>
				<button class="accordion2" id="accordion2" type="button">Conexion</button>
				<?php
			}
		?>

			<div class="panel" onload="loadPanel()">
				<div align="center" class="login-box">
				<h1>Conexion</h1>
				<br>

				<form method="POST" action="">
					<div class="textbbox">
							<input type="text" name="mailconnect" placeholder="Mail | Pseudo">					
					</div>
					<div class="textbbox">
							<input type="password" name="mdpconnect" placeholder="Mot de passe">					
					</div>
					<input type="submit" name="formconnexion" value="Se connecter" class="btn">
				</form>

				<?php
					if(isset($erreur)){
						echo '<font color="red">'.$erreur."</font>";
					}
				?>

				</div>
			</div>
		</div>

	<script type="text/javascript">
		var acc1 = document.getElementsByClassName("accordion1");
		var acc2 = document.getElementsByClassName("accordion2");

		var panel1 = acc1[0].nextElementSibling;
		var panel = acc2[0].nextElementSibling;

			acc1[0].onclick = function(){
				if(document.getElementById("accordion2").classList.contains("active")){
					document.getElementById("accordion2").classList.remove("active");	
					panel.style.maxHeight = null;		
				}
				this.classList.toggle("active");

				if(panel1.style.maxHeight){
					panel1.style.maxHeight = null;
				}else{
					panel1.style.maxHeight = panel1.scrollHeight + "px";
				}
			
			}
		
			acc2[0].onclick = function(){
				if(document.getElementById("accordion1").classList.contains("active")){
					document.getElementById("accordion1").classList.remove("active");
					panel1.style.maxHeight = null;					
				}

				this.classList.toggle("active");

				if(panel.style.maxHeight){
					panel.style.maxHeight = null;
				}else{
					panel.style.maxHeight = panel.scrollHeight + "px";
				}


			}
		


	</script>

		<script type="text/javascript" src="js/menu.js"></script>
	</body>
</html>