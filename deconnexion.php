<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: conexioninscription.php?id=2")
?>