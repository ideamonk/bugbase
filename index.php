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
			$smarty->assign('my_open_count', getMyBugCount('open'));
			$smarty->assign('my_fixed_count', getMyBugCount('fixed'));
			$_SESSION['currentpage']='home';
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
			$_SESSION['currentpage']='reportNew';
			
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
			if (!isset($_GET['filter'])){
				// when no filter is set on buglist, show all of them
				$smarty->assign('subtitle','All bugs');
				$smarty->assign('buglist_heading', 'All bugs');
				$smarty->assign('buglist',getAllBugList());
				$_SESSION['currentpage']='allbugs';
			} else {
				switch ($_GET['filter']){
					case 'self':
						$smarty->assign('subtitle','Bugs related to you');
						$smarty->assign('buglist_heading', 'Bugs related to you');
						$smarty->assign('buglist',getMyBugList());
						$_SESSION['currentpage']='mybugs';
						break;
						
					case 'self_fixed':
						$smarty->assign('subtitle','Bugs fixed by you');
						$smarty->assign('buglist_heading', 'Bugs fixed by you');
						$smarty->assign('buglist',getMyFixedBugList());
						$_SESSION['currentpage']='mybugs';
						break;
					
				}
			}
			// hilighting is common to all
			if (isset($_GET['highlight'])){
					$smarty->assign('highlight',$_GET['highlight']);
			}
		}
		break;
		
		case 'projects':
			$template = 'projectlist.html';
			$smarty->assign('subtitle','Projects');
			$smarty->assign('projectlist_heading', 'All projects');
			$smarty->assign('projectlist',getProjectList());
			$_SESSION['currentpage']='projects';
			break;
		default:
			header("Location: /index.php?page=home");
}

session_to_smarty($smarty);							// move all session data to be available in views
$smarty->display('header.html');				// concatenate other common parts together
$smarty->display($template);
$smarty->display('footer.html');
?>
