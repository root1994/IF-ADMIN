<?php
session_name("IF-ADMIN");
session_start();

include('config.php');

$action = (isset($_POST['action'])? $_POST['action']: (isset($_GET['action'])? $_GET['action']:null ));

$User = (isset($_POST['User'])? $_POST['User']: (isset($_GET['User'])? $_GET['User']:null ));

if ($action) {

	switch ($action) {

		case 'Connection':

			$_SESSION['User'] = $User;
			
		break;

		/* ____________________________________   Default action   ______________________________________________________ */
		default:

		break;

	}
}	    
?>

