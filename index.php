<?php

include_once('includes/db.inc.php');			// DB connectivity
include_once('includes/helpers.inc.php');		// misc helpers
include_once('includes/auth.inc.php');			// user authentication

require 'libs/Smarty.class.php';				// templating engine
$smarty = new Smarty;

stop_sql_injection();							// sanitize request data

$template = 'login.html';						// let default page be login
$smarty->assign('subtitle', 'Login');

if (!isset($_GET['page']))
	$page = '';
else
	$page = $_GET['page'];

switch ($page){
	case 'confirm':
		checkLogin();
		if (loggedIn()){
			header("Location: /index.php?page=home");
		} else {
			$smarty->assign('login_error', 'Invalid username or password.');
		}
		break;
	
	case 'home':
		if (loggedIn()){
			$template = 'home.html';
			$smarty->assign('subtitle', 'Home');
		}
		break;
}

$smarty->display('header.html');				// concatenate other common parts together
$smarty->display($template);
$smarty->display('footer.html');
?>
