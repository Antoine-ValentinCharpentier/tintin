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
		<link type="text/css" rel="stylesheet" href="css/loader.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<link rel="stylesheet" type="text/css" href="css/accueil.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<title>Tintin - Accueil</title>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

	</head>

<?php	
if(!isset($_GET['id'])){
	?>
	<body>
	<?php
}else{
	?>
	<body class="body">
	<?php
}
?>
<?php
	if(!isset($_GET['id'])){
		?>
		<div class="container" id="container">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="847px" height="320px" viewBox="0 0 847 320" enable-background="new 0 0 847 320" xml:space="preserve">
			<g>
				<path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M2.2,176.601l92.799-47.799v13.8L16.8,181.801v0.4l78.199,39V235
					L2.2,187.401V176.601z"/>
				<path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M107.999,243l55.599-144.998h13.8L121.398,243H107.999z"/>
				<path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M184.296,86.8l148.5-12.9l14.7-62.1c0.797-2.798,2.4-5.146,4.8-7.05
					c2.4-1.898,5.1-2.85,8.1-2.85c3.999,0,7.2,1.35,9.6,4.05c2.4,2.7,3.6,5.751,3.6,9.15c0,0.6-0.103,1.251-0.3,1.95
					c-0.202,0.703-0.3,1.252-0.3,1.65l-15.6,53.1l270-23.4h1.5c3.398,0,6.348,1.251,8.851,3.75c2.498,2.503,3.75,5.55,3.75,9.15
					c0,3.403-1.153,6.3-3.45,8.7c-2.302,2.4-5.151,3.802-8.55,4.2L352.596,88l-66.9,228c-0.6,2.198-2.1,3.3-4.5,3.3
					c-3.202,0-4.8-1.603-4.8-4.8v-0.9l52.8-224.399l-144.3,7.2c-1.402,0-2.55-0.497-3.45-1.5c-0.9-0.999-1.35-2.198-1.35-3.6
					C180.096,88.703,181.493,87.203,184.296,86.8z"/>
				<path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M386.193,175.9l-0.9,1.8l-2.7,6.3c-1.003,3.202-2.1,6.15-3.3,8.85
					c-1.2,2.7-2.203,5.452-3,8.25l-2.7,8.7l-0.9,4.2c-0.6,1.604-1.05,3.201-1.35,4.8c-0.3,1.604-0.647,3.202-1.05,4.8l4.5-5.699
					l5.7-7.2l5.4-7.5l7.8-11.1l4.2-5.7l3.6-5.7l2.7-3.9c1.397-1.997,2.747-4.247,4.05-6.75c1.299-2.498,3.347-3.75,6.15-3.75
					c1.8,0,3.248,0.6,4.35,1.8c1.097,1.2,1.65,2.503,1.65,3.9c-0.202,2.203-1.153,4.251-2.85,6.15c-1.702,1.903-3.15,3.652-4.35,5.25
					l-8.1,10.8l-5.4,7.5l-13.5,18.6l-5.4,7.8l-5.7,7.5l-3,3.9l-1.2,1.2c-0.197,0-0.3,0.047-0.3,0.149c0,0.099-0.098,0.15-0.3,0.15
					l-0.6,0.6c-0.197,0-0.3,0.047-0.3,0.15c0,0.099-0.099,0.15-0.3,0.15l-0.6,0.3c-0.398,0.398-0.75,0.548-1.05,0.45
					c-0.3-0.104-0.548-0.052-0.75,0.149l-3.6-0.6c-0.999-0.403-1.697-0.802-2.1-1.2c-0.398-0.403-0.9-0.9-1.5-1.5l-0.6-1.2
					c-0.398-0.403-0.6-0.802-0.6-1.2c0-0.402-0.099-0.703-0.3-0.899l-0.6-1.8c0-1.599-0.099-3.047-0.3-4.351
					c-0.197-1.298-0.3-2.648-0.3-4.05l0.9-9.9l0.9-9.3l4.2-28.2l1.2-9.3V169c0.403-2.798,1.702-5.198,3.9-7.2c2.203-1.997,4.8-3,7.8-3
					c3.197,0,5.948,1.153,8.25,3.45c2.297,2.302,3.45,5.151,3.45,8.55C387.393,172.6,386.99,174.302,386.193,175.9z M376.893,121.9
					l0.9-10.2c0.398-3.197,1.749-5.799,4.05-7.8c2.297-1.997,4.847-3,7.65-3c3.398,0,6.249,1.2,8.55,3.6c2.297,2.4,3.45,5.203,3.45,8.4
					c0,1.003-0.103,1.903-0.3,2.7c-0.202,0.801-0.403,1.5-0.6,2.1l-4.5,9.6c-1.003,1.8-2.353,3.15-4.05,4.05
					c-1.702,0.9-3.45,1.35-5.25,1.35c-3.403,0-5.902-1.148-7.5-3.45C377.69,126.953,376.893,124.501,376.893,121.9z"/>
				<path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M430.289,163.3l-12,24.6l1.5-2.1c1.997-2.4,4.097-4.8,6.3-7.2
					c2.198-2.4,4.396-4.697,6.6-6.9l3.6-3.6c0.398,0,0.797-0.3,1.2-0.9l2.7-1.5l1.8-0.6l0.601-0.3c0-0.197,0.098-0.3,0.299-0.3h0.9
					c0.398-0.197,1.2-0.3,2.4-0.3h0.9c0.6,0.403,1.199,0.6,1.799,0.6c0.601,0,1.299,0.202,2.101,0.6l1.5,1.2
					c1.397,1.003,2.349,2.053,2.851,3.15c0.496,1.102,0.75,1.753,0.75,1.95l1.199,4.2l0.301,5.7c0,1.003,0,1.852,0,2.55
					c0,0.703-0.104,1.552-0.301,2.55l-1.5,13.8l-1.199,9l0.6-0.9c2.799-3.797,5.297-7.547,7.5-11.25c2.198-3.699,4.5-7.449,6.9-11.25
					l6.299-12l1.801-4.2c1.396-2.4,3.398-3.6,6-3.6c1.8,0,3.3,0.652,4.5,1.95c1.199,1.303,1.8,2.751,1.8,4.35c0,0.6-0.103,1.2-0.3,1.8
					c-0.201,0.6-0.301,1.2-0.301,1.8l-9.6,15.9l-9.9,15.6l-4.799,7.8c-0.601,1.003-1.402,2.1-2.4,3.3c-1.004,1.2-1.701,2.002-2.1,2.4
					l-1.801,2.399l-2.4,1.801c-0.201,0.402-0.703,0.801-1.5,1.199l-3.6,1.5c-0.801,0-1.401-0.098-1.8-0.3
					c-0.403-0.196-0.899-0.3-1.5-0.3l-1.5-0.6l-2.399-2.4l-1.5-3.6l-0.9-4.2c0-1.2-0.104-2.499-0.301-3.9
					c-0.201-1.396-0.299-2.597-0.299-3.6l-1.201-18.6v-0.3l-7.199,7.2l-6,6.3c-4.003,4.604-8.1,9.052-12.3,13.351
					c-4.2,4.303-8.198,8.85-12,13.649l-7.8,9.9l-2.1,3.3c0,0.197-0.099,0.398-0.3,0.6l-0.9,1.5l-1.5,1.2
					c-0.398,0.398-0.848,0.75-1.35,1.05c-0.497,0.301-1.448,0.45-2.85,0.45c-1.2,0-2.55-0.6-4.05-1.8s-2.25-2.803-2.25-4.8V241l0.3-0.9
					c0-0.201,0.103-0.3,0.3-0.3v-0.6l0.6-0.9l0.3-0.6l0.9-1.2l0.9-1.5l0.9-2.1l3.3-8.4c4.603-11.4,8.653-22.898,12.15-34.5
					c3.502-11.597,6.652-23.1,9.45-34.5c0.802-2.798,2.203-5.048,4.2-6.75c1.997-1.697,4.396-2.55,7.2-2.55c3.398,0,6.249,1.2,8.55,3.6
					c2.297,2.4,3.45,5.203,3.45,8.4c0,1.003-0.104,1.8-0.3,2.4L430.289,163.3z"/>
				<path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M488.188,117.4l7.8-1.2c0.398-1.599,0.849-3.15,1.351-4.65
					c0.496-1.5,1.049-3.047,1.649-4.65l4.8-11.7l1.5-3.3c0.998-0.999,1.848-2.147,2.551-3.45c0.697-1.299,1.649-2.447,2.85-3.45
					l1.5-0.9c0.398-0.197,1.05-0.497,1.949-0.9c0.9-0.398,1.848-0.6,2.851-0.6h1.8c3.197,0,6,1.401,8.4,4.2
					c2.4,2.803,3.6,5.602,3.6,8.4c0,0.801-0.051,1.5-0.15,2.1c-0.103,0.6-0.149,1.2-0.149,1.8l-1.8,6l-2.1,5.7l147.6-26.4h1.8
					c3.398,0,6.248,1.153,8.55,3.45c2.297,2.301,3.45,5.151,3.45,8.55c0,2.803-0.951,5.302-2.85,7.5
					c-1.903,2.203-4.252,3.501-7.051,3.9l-158.399,17.7c-0.201,0.403-0.403,0.75-0.6,1.05c-0.202,0.3-0.404,0.652-0.601,1.05l-4.2,8.1
					l-3.3,5.4c-0.403,1.2-0.802,2.353-1.2,3.45c-0.402,1.102-0.801,2.152-1.199,3.15l-7.801,22.2l-7.199,22.2
					c-0.601,1.8-1.252,3.651-1.951,5.55c-0.703,1.903-1.251,3.75-1.649,5.55l-3.3,11.399l-1.5,5.4c-1.599,5.4-3.197,11.503-4.801,18.3
					c-1.598,6.797-2.197,12.797-1.799,18c0,0.398,0.051,0.797,0.149,1.2c0.103,0.398,0.149,0.797,0.149,1.2v0.3l2.701-1.8l5.699-5.7
					l6.9-9l6.6-9.6l9-15.301l2.7-4.8c1.997-3.398,3.797-6.899,5.399-10.5c1.6-3.6,3.398-7.097,5.4-10.5l7.2-15.9l2.399-5.4
					c0.797-1.997,2.297-3,4.5-3c3.398,0,5.101,1.603,5.101,4.8c0,0.403-0.052,0.802-0.149,1.2c-0.104,0.403-0.15,0.802-0.15,1.2
					l-11.1,21l-17.101,31.5c-1.003,1.8-2.054,3.501-3.149,5.1c-1.102,1.604-2.054,3.3-2.851,5.101l-6.601,9.899
					c-1.4,1.997-2.953,4.247-4.649,6.75c-1.702,2.499-3.554,4.847-5.55,7.05c-2.002,2.199-4.153,4.098-6.45,5.7
					c-2.297,1.599-4.649,2.4-7.05,2.4h-0.9c-2.799,0-5.297-2.302-7.5-6.9l-0.3-1.8c-0.601-2.803-0.849-5.151-0.75-7.05
					c0.103-1.903,0.149-3.952,0.149-6.15c0.601-6.201,1.304-12.3,2.101-18.3c0.802-6,1.702-11.896,2.7-17.7l2.1-11.7
					c0.403-1.997,0.802-3.946,1.2-5.85c0.403-1.898,0.802-3.849,1.2-5.85l2.4-12c-0.797-0.999-1.201-2.297-1.201-3.9
					c-0.196-3.999,0.75-7.95,2.851-11.85s3.647-7.65,4.649-11.25l2.101-7.5l3.601-12.9l-2.4,0.3c-1.604,0-3.052-0.45-4.35-1.35
					c-1.304-0.9-1.951-2.349-1.951-4.35C483.387,120.1,484.986,118.202,488.188,117.4z"/>
				<path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M549.684,175.9l-0.9,1.8l-2.7,6.3c-1.003,3.202-2.101,6.15-3.3,8.85
					c-1.2,2.7-2.203,5.452-3,8.25l-2.7,8.7l-0.899,4.2c-0.601,1.604-1.051,3.201-1.351,4.8c-0.3,1.604-0.647,3.202-1.05,4.8l4.5-5.699
					l5.699-7.2l5.4-7.5l7.801-11.1l4.199-5.7l3.6-5.7l2.701-3.9c1.396-1.997,2.746-4.247,4.049-6.75c1.299-2.498,3.348-3.75,6.15-3.75
					c1.801,0,3.248,0.6,4.35,1.8c1.098,1.2,1.65,2.503,1.65,3.9c-0.201,2.203-1.152,4.251-2.85,6.15c-1.701,1.903-3.15,3.652-4.35,5.25
					l-8.101,10.8l-5.399,7.5l-13.5,18.6l-5.4,7.8l-5.7,7.5l-3,3.9l-1.2,1.2c-0.197,0-0.3,0.047-0.3,0.149c0,0.099-0.099,0.15-0.3,0.15
					l-0.6,0.6c-0.197,0-0.301,0.047-0.301,0.15c0,0.099-0.098,0.15-0.3,0.15l-0.601,0.3c-0.398,0.398-0.75,0.548-1.049,0.45
					c-0.301-0.104-0.549-0.052-0.75,0.149l-3.601-0.6c-0.999-0.403-1.696-0.802-2.101-1.2c-0.398-0.403-0.899-0.9-1.5-1.5l-0.6-1.2
					c-0.398-0.403-0.6-0.802-0.6-1.2c0-0.402-0.099-0.703-0.301-0.899l-0.6-1.8c0-1.599-0.098-3.047-0.3-4.351
					c-0.196-1.298-0.3-2.648-0.3-4.05l0.9-9.9l0.899-9.3l4.2-28.2l1.199-9.3V169c0.404-2.798,1.702-5.198,3.9-7.2
					c2.203-1.997,4.801-3,7.801-3c3.196,0,5.947,1.153,8.25,3.45c2.297,2.302,3.449,5.151,3.449,8.55
					C550.883,172.6,550.48,174.302,549.684,175.9z M540.383,121.9l0.9-10.2c0.398-3.197,1.748-5.799,4.05-7.8
					c2.297-1.997,4.847-3,7.649-3c3.398,0,6.249,1.2,8.551,3.6c2.297,2.4,3.449,5.203,3.449,8.4c0,1.003-0.103,1.903-0.299,2.7
					c-0.202,0.801-0.404,1.5-0.601,2.1l-4.5,9.6c-1.003,1.8-2.353,3.15-4.05,4.05c-1.701,0.9-3.45,1.35-5.25,1.35
					c-3.403,0-5.902-1.148-7.5-3.45C541.18,126.953,540.383,124.501,540.383,121.9z"/>
				<path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M593.779,163.3l-12,24.6l1.5-2.1c1.996-2.4,4.098-4.8,6.301-7.2
					c2.197-2.4,4.396-4.697,6.6-6.9l3.6-3.6c0.398,0,0.797-0.3,1.199-0.9l2.701-1.5l1.799-0.6l0.602-0.3c0-0.197,0.098-0.3,0.299-0.3
					h0.9c0.398-0.197,1.199-0.3,2.4-0.3h0.9c0.6,0.403,1.199,0.6,1.799,0.6s1.299,0.202,2.1,0.6l1.5,1.2
					c1.398,1.003,2.35,2.053,2.852,3.15c0.496,1.102,0.75,1.753,0.75,1.95l1.199,4.2l0.301,5.7c0,1.003,0,1.852,0,2.55
					c0,0.703-0.104,1.552-0.301,2.55l-1.5,13.8l-1.199,9l0.6-0.9c2.799-3.797,5.297-7.547,7.5-11.25c2.197-3.699,4.5-7.449,6.9-11.25
					l6.299-12l1.801-4.2c1.396-2.4,3.398-3.6,6-3.6c1.799,0,3.299,0.652,4.5,1.95c1.199,1.303,1.799,2.751,1.799,4.35
					c0,0.6-0.102,1.2-0.299,1.8c-0.201,0.6-0.301,1.2-0.301,1.8l-9.6,15.9l-9.9,15.6l-4.799,7.8c-0.602,1.003-1.402,2.1-2.4,3.3
					c-1.004,1.2-1.701,2.002-2.1,2.4l-1.801,2.399l-2.4,1.801c-0.201,0.402-0.703,0.801-1.5,1.199l-3.6,1.5
					c-0.801,0-1.402-0.098-1.801-0.3c-0.402-0.196-0.898-0.3-1.5-0.3l-1.5-0.6l-2.398-2.4l-1.5-3.6l-0.9-4.2
					c0-1.2-0.104-2.499-0.301-3.9c-0.201-1.396-0.299-2.597-0.299-3.6l-1.201-18.6v-0.3l-7.199,7.2l-6,6.3
					c-4.004,4.604-8.1,9.052-12.301,13.351c-4.199,4.303-8.197,8.85-12,13.649l-7.799,9.9l-2.101,3.3c0,0.197-0.099,0.398-0.3,0.6
					l-0.9,1.5l-1.5,1.2c-0.398,0.398-0.848,0.75-1.35,1.05c-0.497,0.301-1.449,0.45-2.85,0.45c-1.201,0-2.551-0.6-4.051-1.8
					s-2.25-2.803-2.25-4.8V241l0.301-0.9c0-0.201,0.103-0.3,0.299-0.3v-0.6l0.601-0.9l0.3-0.6l0.9-1.2l0.9-1.5l0.899-2.1l3.3-8.4
					c4.604-11.4,8.653-22.898,12.15-34.5c3.502-11.597,6.651-23.1,9.449-34.5c0.803-2.798,2.203-5.048,4.201-6.75
					c1.996-1.697,4.396-2.55,7.199-2.55c3.398,0,6.248,1.2,8.551,3.6c2.297,2.4,3.449,5.203,3.449,8.4c0,1.003-0.104,1.8-0.301,2.4
					L593.779,163.3z"/>
				<path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M843.473,187.601L750.675,235v-13.8l78.799-39v-0.4l-78.799-39.199
					v-13.8l92.798,47.599V187.601z"/>
			</g>
			</svg>

			<div class="blinking">
				<p>Made by Antoine-Valentin</p>
			</div>
		</div> 

	<?php
	}
?>
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

<section class="headerimagebackground animepara">
	<div class="containerpara">
		<div class="title">
			<span class="text1">Bienvenue sur</span>
			<span class="text2">&lt/ Tintin &gt</span>
		</div>
	</div>
</section>

		<p class="citation">"Tintin ne lutte pas pour le bonheur de tous les hommes, mais chaque fois que les hasards de ses aventures l'ont mis en présence d'un homme victime de la misère, de l'injustice, de la violence, c'est pour cet homme-là que Tintin a pris parti." Hergé</p>

		<p class="indextitlename1">Les aventures de Tintin</p>
		<p class="indexpresentation1">Les Aventures de Tintin sont une série de bandes dessinées élaborées par le dessinateur et scénariste Hergé de nationalité belge.
		<br><br>
		Les Aventures de Tintin font partie des plus célèbres et des plus populaires bandes dessinées européennes du XXe siècle avec un total de plus de 230 millions de bandes déssinées vendues. Elles ont été traduites en une centaine de langues différentes et des adaptations on vu le jours au cinéma puis à la télévision. Elles se déroulent dans un univers réaliste et parfois fantastique. Le héros de la série est le personnage se nommant Tintin, un jeune reporter; il réalisera ces aventures à l'aide de son chien : Milou. Au fil des albums, plusieurs figures apparaissent, c'est le cas notamment du capitaine Haddock, des frères Dupond et Dupont alias les Duponds, ou encore le professeur Tournesol et bien d'autre.
		<br><br>
		La série est appréciée pour ses dessins qui mélangent personnages aux proportions exagérées et décors réalistes. Les intrigues des albums mélangent les genres : des aventures à l'autre bout du monde, des enquêtes policières, des histoires d'espionnage, de la science-fiction, du fantastique.</p>

		<p class="indextitlename2">Qui est Hergé ?</p>
		<p class="indexpresentation2">
		 Georges Remi plus connut sous le nom d'Hergé, est né le 22 mai 1907 à Etterbeek (Bruxelles). Son père Alexis travaillait dans une maison de confection pour enfants tandis que sa mère Elisabeth, née Dufour n'exerçait aucune profession. Hergé aura un frère cadet cinq ans plus tard, avec qui il n'aura que très peu de contacts.
		<br><br>
		De 1914 à 1918, Georges est élève à l'école communale d'Ixelles. Il avouera plus tard qu'il dessinait déjà dans ses cahiers... L'enfant fut ensuite retiré de l'école laïque pour être scolarisé à l'Institut Saint-Boniface où il fit ses études secondaires. Il y était excellent élève.<br>
		En même temps qu'il change d'école, George quitte les Boy-Scouts de Belgique pour faire partie de la Fédération des Scouts catholiques. 
		Pourtant, assez vite, il devint chef de la patrouille des "Ecureuils" et prit le surnom de "Renard curieux". Pendant son scoutisme, il voyagea en Autriche, en Espagne en Italie et en Suisse. Durant cette même période, il se passionne pour l'Amérique et les Peaux-Rouges et dessine des histoires scoutes qui paraîtront à partir de décembre 1924 dans Le Boy-Scout belge. Dès cette date, il signe ses dessins "Hergé" (initiales inversées de Georges Rémi).<br>
		A cette époque, ces derniers sont assez maladroits. Pourtant, Hergé créa sa première bande dessinée, Totor, C.P. des Hannetons, en juillet 1926. Les aventures de Totor, qui préfigurent Tintin, seront publiées jusqu'en 1930.
		<br><br>
		En 1925, après avoir fini ses études, Georges rentra au quotidien Le XXème Siècle, "journal catholique de doctrine et d'information" dirigé par l'abbé Norbert Wallez. Le journal était nettement nationaliste et clérical. Hergé était employé au service des abonnements. En même temps que son travail, il continuait à fournir au Boy-Scout belge les planches de Totor.
		Ses parents, découvrant sa passion pour le dessin, lui firent suivre des cours à l'Ecole Saint-Luc, spécialisée dans les arts graphiques. Mais Hergé, n'ayant pas réussi les examens d'admissions, abandonna. Sa formation tout au long de sa carrière sera celle d'un autodidacte.
		<br><br>
		En 1926, il est affecté au premier régiment de chasseurs à pied pour son service militaire. Commençant simple soldat, il devint caporal puis sergent. Et dès ses moments de liberté, Hergé s'adonne au dessin.</p>

		<div class="indexiframe">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/Z3PzxHIeuyI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>		
		</div>

		<p class="indextitlename3">Les albums</p>
		<p class="indexpresentation3">Pour des générations entières, les aventures de Tintin ont été l'occasion d'une véritable initiation à la géographie. En des temps où n'existaient ni la télévision ni magazine de grand reportage, les péripéties du reporter ont ouvert pour les jeunes une fenêtre sur les paysages et les phénomènes naturels les plus spectaculaires d'un monde encore très mal connu : la Terre. Des sables du Sahara aux glaciers himalayens, en passant par les forêts d'Amazonie et les landes de l'Ecosse, les vignettes en couleur d'Hergé foisonnent de détails, révèlent une planète truffée de surprises et d'embûches.</p>

		<div class="image-section3">
			<ul class="image-grid3">
			<?php
				for ($i = 1; $i <= 24; $i++) {
					?>
					<li>
						<div class="image-box3 image-img-3">
							<img src="images/albums/<?php echo $i;?>.jpg">
						</div>
					</li>
				    <?php
				}
			?>
			</ul>
		</div>


		<p class="indextitlename4">Les personnages principaux</p>
		<div class="image-section">
			<ul class="image-grid">
				<li>
					<div class="image-box image-img-1">
						<img src="images/personnage/important/tintin.png">
						<div class="image-info">
							<h3>Tintin</h3>						
						</div>
					</div>
				</li>

				<li>
					<div class="image-box image-img-1">
						<img src="images/personnage/important/milou.png">
						<div class="image-info">
							<h3>Milou</h3>							
						</div>
					</div>
				</li>
				<li>
					<div class="image-box image-img-1">
						<img src="images/personnage/important/haddock.png">
						<div class="image-info">
							<h3>Capitaine Haddock</h3>								
						</div>
					</div>
				</li>

				<li>
					<div class="image-box image-img-1">
						<img src="images/personnage/important/dupondt.png">
						<div class="image-info">
							<h3>Dupond et Dupont</h3>								
						</div>
					</div>
				</li>

				<li>
					<div class="image-box image-img-1">
						<img src="images/personnage/important/tournesol.png">
						<div class="image-info">
							<h3>Le professeur Tournesol</h3>						
						</div>
					</div>
				</li>

				<li>
					<div class="image-box image-img-1">
						<img src="images/personnage/important/nestor.jpg">
						<div class="image-info">
							<h3>Nestor</h3>							
						</div>
					</div>
				</li>

				<li>
					<div class="image-box image-img-1">
						<img src="images/personnage/important/castafiore.png">
						<div class="image-info">
							<h3>Bianca Castafiore</h3>								
						</div>
					</div>
				</li>

				<li>
					<div class="image-box image-img-1">
						<img src="images/personnage/important/rastapopoulos.png">
						<div class="image-info">
							<h3>Rastapopoulos</h3>								
						</div>
					</div>
				</li>
			</ul>
		</div>

		<p class="indextitlename5">Les personnages secondaires</p>

		<div class="image-section2">
			<ul class="image-grid2">
				<?php
					$name = array("Allan-Thompson", "Alvarez", "Aristide-Filoselle", "Perez-Alonzo", "Bada-Ramon", "Balthazar", "Barnabé", "Baxter", "Bazaroff", "Bikoulou", "Bohlwinkel", "Boris le colonel", "Isidore Boullu", "Boustringovitch", "Gibbons", "Bobby Smiles", "Le professeur Siclone", "Didi", "Wang Jen-Ghié", "Philippulus", "Ivan Ivanovitch Sakharine", "Irma", "Le colonel Sponsz","Pablo", "Le professeur Calys", "Caraco", "Carreidas", "Capitaine Chester", "Chevalier François de Hadoque", "Chicklet", "Chiquito - Rupac Inca Huaco", "Cipaçalouvishni", "Coco", "Monsieur Czarlitz", "J.M. Dawson", "Diaz", "Endaddine Akass", "Ernestine", "Euclide", "Fang Se-Yeng", "Foudre bénie", "Gibbon", "Le Goffic", "Grand Precieux", "Professeur Nestor Halambique", "Igor Wagner", "Jimenez", "Juanitos", "Jules", "Kaloma", "Kaviarovitch", "Les frères Loiseau", "Mac Duff", "Le maharadjah de Rawhajpoutalah", "Major wings", "Mitsuhirato", "Mogador", "Ben kalish ezab", "Muganga", "Muskar XII", "Le senhor Oliveira da Figueira", "L'inca", "Rackam le Rouge", "Ridgewell", "Rizotto Walter", "Rodriguez", "Ronchont", "Sanzot", "Piotr Szut", "Tapioca", "Taupe-au-regard-perçant", "Tharkey", "Porfirio Bolero Calamares", "Boule de neige", "Paul Cantonneau", "Marc Charlet", "Erik Bjorgenskjold", "Madame Boullu", "Tom 1", "Triboulet", "Trujillo", "Van Damme", "Wizskizsek", "Yeti", "Zorrino", "Général Alcazar", "Le professeur Bergamotte", "Séraphin Lampion", "Docteur Muller", "Rascar Capac");
					for ($i = 1; $i <= 85; $i++) {
						?>
						<li>
							<div class="image-box2 image-img-2">
								<img src="images/personnage/secondaire/<?php echo $name[$i-1];?>.jpg">
								<div class="image-info2">
									<h3><?php echo $name[$i-1];?></h3>						
								</div>
							</div>
						</li>
					    <?php
					}
				?>
				<?php

					for ($i = 86; $i <= 90; $i++) {
						?>
						<li>
							<div class="image-box2 image-img-2">
								<img src="images/personnage/secondaire/<?php echo $name[$i-1];?>.png">
								<div class="image-info2">
									<h3><?php echo $name[$i-1];?></h3>						
								</div>
							</div>
						</li>
					    <?php
					}
				?>
			</ul>
		</div>

		<script type="text/javascript" src="js/menu.js"></script>
		<script type="text/javascript" src="js/loader.js"></script>

		<script src="js/parallax.js"></script>

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