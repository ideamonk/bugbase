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
			
			// put in form data for select options
			$formdata = getNewFormData();
			foreach($formdata as $key=>$val){
				$smarty->assign($key, $val);
			}
		}
		break;
	
	case 'addNew':
		if (loggedIn()){
			if (($bug_id = addNewBug()) > 0){
				header("Location: /index.php?page=list&highlight=$bug_id");
			}
			// otherwise case never comes as it dies in addNewBug itself
		}
		break;
		
	case 'list':
		if (loggedIn()){
			$template = 'buglist.html';
			$smarty->assign('subtitle','bug list');
			$smarty->assign('buglist',getAllBugList());
			if (isset($_GET['highlight'])){
				$smarty->assign('highlight',$_GET['highlight']);
			}
		}
		break;
}

session_to_smarty($smarty);							// move all session data to be available in views
$smarty->display('header.html');				// concatenate other common parts together
$smarty->display($template);
$smarty->display('footer.html');
?>
