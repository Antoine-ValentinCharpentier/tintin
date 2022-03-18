<?php
	session_start();
	include "db.php";
?>
<html lang="fr">
	<head>
			<link rel="shortcut icon" href="images/logotitle.ico" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<link type="text/css" rel="stylesheet" href="css/menu.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<link rel="stylesheet" type="text/css" href="css/galerie.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<title>Tintin - Galerie</title>

	</head>
	<body>

		<!-- MENU + SIDEBAR -->

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
		
	<!--	<div><img src="images/wallpaper/tintin1.jpg" class="tintin"></div>-->

		<div class="galerie">
			<?php
				for ($i = 1; $i <= 46; $i++) {
					?>
				    <div><a href="images/wallpaper/tintin<?php echo $i;?>.jpg"><img src="images/wallpaper/tintin<?php echo $i;?>.jpg"></a></div>
				    <?php
				}
			?>

		</div>

		<br><br>


		<script type="text/javascript" src="js/menu.js"></script>
		<script type="text/javascript" src="js/loader.js"></script>

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

	</body>
</html>