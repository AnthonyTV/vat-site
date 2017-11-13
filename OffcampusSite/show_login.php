<?php
	ob_start();
	session_start();
	$_SESSION['show_login'] = 1;
	header('Location: loginform.php');

?>
