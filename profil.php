			<?php
			  	function Tronquerdate_publication($date_publication){
						return date('d/m/y à G:i', strtotime($date_publication));
					}
			?>

<?php
	session_start();

	include "db.php";

	if(!isset($_SESSION['id'])){
		header("Location: conexioninscription.php?id=2");
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
		<title>Tintin - Profil</title>
		<meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
			  <link type="text/css" rel="stylesheet" href="css/menu.css" />
			  <link rel="stylesheet" type="text/css" href="css/footer.css">
			  <link rel="stylesheet" type="text/css" href="css/profil.css">
			  		<link rel="stylesheet" type="text/css" href="css/wrapper.css">
			  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
			  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

				<script type="text/javascript">
					function loadPanel(){
						<?php
							$searchavatar = "default.png";
							$searchprofilname = "X";
							$searchprofmail = "X";
							$searchprofildateinscription = "X";
							$searchprofilsexe = "X";
							$searchprofildescription = "X";
							$searchprofilnbpost = "X";
							$searchprofilnbsujet = "X";
						?>
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
<?php
	if (isset($_SESSION['id']) AND isset($_POST['subbmitreqprofil'])) {
		$reqprofil = htmlspecialchars($_POST['reqprofil']);

		if(isset($_POST['reqprofil']) AND !empty($reqprofil)){
			$reqprofil = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
			$reqprofil->execute(array($_POST['reqprofil']));
			$searchprofil = $reqprofil->rowCount();

			if($searchprofil == 1){
				$userinfo = $reqprofil->fetch();
				$searchavatar = $userinfo['avatar'];
				$searchprofilname = $userinfo['pseudo'];
				$searchprofmail = $userinfo['mail'];
				$searchprofildateinscription = "Le ".Tronquerdate_publication($userinfo['date_inscription']);
				$searchprofilsexe = $userinfo['sexe'];
				$searchprofildescription = $userinfo['description'];
				$searchprofilnbpost = $userinfo['nbpost'];
				$searchprofilnbsujet = $userinfo['nbsujet'];
			}else{
				$searchavatar = "default.png";
				$searchprofilname = "X";
				$searchprofmail = "X";
				$searchprofildateinscription = "X";
				$searchprofilsexe = "X";
				$searchprofildescription = "X";
				$searchprofilnbpost = "X";
				$searchprofilnbsujet = "X";
			}

		}else{
			$searchavatar = "default.png";
			$searchprofilname = "X";
			$searchprofmail = "X";
			$searchprofildateinscription = "X";
			$searchprofilsexe = "X";
			$searchprofildescription = "X";
			$searchprofilnbpost = "X";
			$searchprofilnbsujet = "X";
		}
	}

?>
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
			<button class="accordion1 active" id="accordion1" type="button">Votre Profil</button>
		<?php
			}else{
				?>
				<button class="accordion1" id="accordion1" type="button">Votre Profil</button>
				<?php
			}
		?>
			<div class="panel" onload="loadPanel()">
				<div class="gauche">
					<img src="membres/avatars/<?php echo $_SESSION['avatar'];?>" class="logo">
				</div>

				<div class="droite">
					<p class="titre">Pseudo</p>
					<p class="profiltext"><?php echo $_SESSION['pseudo']; ?></p>
					<p class="titre">Mail</p>
					<p class="profiltext"><?php echo $_SESSION['mail']; ?></p>
					<p class="titre">Date d'inscription</p>
					<p class="profiltext"><?php echo "Le ".Tronquerdate_publication($_SESSION['dateinscription']); ?></p>
					<p class="titre">Sexe</p>
					<p class="profiltext"><?php echo $_SESSION['sexe']; ?></p>
					<p class="titre">Commentaire</p>
					<p class="profiltext"><?php echo $_SESSION['description']; ?></p>
					<p class="titre">Nombre de Post</p>
					<p class="profiltext"><?php echo $_SESSION['nbpost']; ?></p>
					<p class="titre">Nombre de sujet crée</p>
					<p class="profiltext"><?php echo $_SESSION['nbsujet']; ?></p>


					<a href="editionprofil.php" class="edition">Editer mon profil</a>

				</div>
			</div>


		<?php
			if(isset($_GET['id']) AND $_GET['id'] == "2"){
		?>
				<button class="accordion2 active" id="accordion2" type="button">Rechercher un Profil</button>
		<?php
			}else{
				?>
				<button class="accordion2" id="accordion2" type="button">Rechercher un Profil</button>
				<?php
			}
		?>

			<div class="panel" onload="loadPanel()">
				<div class="gauche">
					<img src="membres/avatars/<?php echo $searchavatar;?>" class="logo">
					<br>
					<p class="namereqprofil">Rechercher une personne</p>
					<form action="" method="POST">
						<input type="text" id="reqprofil" name="reqprofil" class="inputreqprofil" placeholder="Pseudo">
						<input type="submit" name="subbmitreqprofil">	
					</form>

				</div>

				<div class="droite">
					<p class="titre">Pseudo</p>
					<p class="profiltext"><?php echo $searchprofilname; ?></p>
					<p class="titre">Mail</p>
					<p class="profiltext"><?php echo $searchprofmail; ?></p>
					<p class="titre">Date d'inscription</p>
					<p class="profiltext"><?php echo $searchprofildateinscription; ?></p>
					<p class="titre">Sexe</p>
					<p class="profiltext"><?php echo $searchprofilsexe; ?></p>
					<p class="titre">Commentaire</p>
					<p class="profiltext"><?php echo $searchprofildescription; ?></p>
					<p class="titre">Nombre de Post</p>
					<p class="profiltext"><?php echo $searchprofilnbpost; ?></p>
					<p class="titre">Nombre de sujet crée</p>
					<p class="profiltext last"><?php echo $searchprofilnbsujet; ?></p>
				</div>
			</div>
		</div>



		<script type="text/javascript" src="js/menu.js"></script>
		<script type="text/javascript">
		var acc1 = document.getElementsByClassName("accordion1");
		var acc2 = document.getElementsByClassName("accordion2");

		var panel1 = acc1[0].nextElementSibling;
		var panel = acc2[0].nextElementSibling;

			acc1[0].onclick = function(){
				document.location.href="profil.php?id=1";/** sinon l'accordion se ferme mais génère un saut dans l'animation**/
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
				document.location.href="profil.php?id=2"; /** sinon l'accordion se ferme mais génère un saut dans l'animation**/

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
	</body>
</html>

<?php
	}else{
		header("Location: conexion.php");
	}
?>