<?php

require 'libs/Smarty.class.php';				// templating engine
$smarty = new Smarty;

include_once('includes/db.inc.php');			// DB connectivity
include_once('includes/models.inc.php');		// Reusable db code
include_once('includes/auth.inc.php');			// user authentication
include_once('includes/helpers.inc.php');		// misc helpers

stop_sql_injection();							// sanitize request data

if (loggedIn()){
	$template = 'home.html';
	$smarty->assign('subtitle', 'home');
} else {
	$template = 'login.html';					// let default page be login if not authenticated
	$smarty->assign('subtitle', 'Login');
}

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
	
	case 'logout':
		logout();
		header("Location: /index.php");
		break;
	
	case 'reportNew':
		if (loggedIn()){
			$template = 'addedit.html';
			$smarty->assign('subtitle','Add new bug');
			$smarty->assign('scripts', array('/static/scripts/addnew.js'));
		}
		break;
	
	case 'addNew':
		if (loggedIn()){
			$template = 'addedit.html';
			$smarty->assign('subtitle','Add new bug');
			$smarty->assign('scripts', array('/static/scripts/addnew.js'));
		}
		break;
		
	case 'list':
		if (loggedIn()){
			$template = 'buglist.html';
			$smarty->assign('subtitle','bug list');
		}
		break;
}

session_to_smarty($smarty);							// move all session data to be available in views
$smarty->display('header.html');				// concatenate other common parts together
$smarty->display($template);
$smarty->display('footer.html');
?>
