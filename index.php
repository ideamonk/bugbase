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

// Default page if no match - 
$default_location = "/index.php?page=home";

switch ($page){
	case 'confirm':
		checkLogin();
		if (loggedIn()){
			header("Location: $default_location");
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
			$smarty->assign('my_active_count', getMyBugCount('in progress'));
			$smarty->assign('last10', last10bugs());
			$smarty->assign('bugsToday', bugsToday());
			$smarty->assign('bugsOld', bugsOld());
			$_SESSION['currentpage']='home';
		}
		break;
	
	case 'logout':
		logout();
		header("Location: /index.php");
		break;
	
	case 'reportNew':
		if (!loggedIn()){ header("Location: $default_location"); }
		$template = 'addedit.html';
		$smarty->assign('subtitle','Add new bug');
		$smarty->assign('scripts', array('/static/scripts/addnew.js'));
		$_SESSION['currentpage']='reportNew';
		
		// put in form data for select options
		$formdata = getNewFormData();
		foreach($formdata as $key=>$val){
			$smarty->assign($key, $val);
		}
		break;
	
	case 'addNew':
		if (!loggedIn()){ header("Location: $default_location"); }
		if (($bug_id = addNewBug()) > 0){
			header("Location: /index.php?page=list&highlight=$bug_id");
		}
		// otherwise case never comes as it dies in addNewBug itself
		break;
		
	case 'list':
		if (!loggedIn()){ header("Location: $default_location"); }
		$template = 'buglist.html';
		if (!isset($_GET['filter'])){
			// when no filter is set on buglist, show all of them
			$smarty->assign('subtitle','All bugs');
			$smarty->assign('buglist_heading', 'All bugs');
			$smarty->assign('buglist',getAllBugList());
			$_SESSION['currentpage']='allbugs';
		} else {
			$_SESSION['currentpage']='mybugs';
			switch ($_GET['filter']){
				case 'self':
					$smarty->assign('subtitle','Bugs related to you');
					$smarty->assign('buglist_heading', 'Bugs related to you');
					$smarty->assign('buglist',getMyBugList());
					break;
				case 'self_open':
					$smarty->assign('subtitle','Your open bugs');
					$smarty->assign('buglist_heading', 'Currently open bugs assigned to you');
					$smarty->assign('buglist',getMyOpenBugList());
					break;
				case 'self_fixed':
					$smarty->assign('subtitle','Bugs fixed by you');
					$smarty->assign('buglist_heading', 'Bugs fixed by you');
					$smarty->assign('buglist',getMyFixedBugList());
					break;
				case 'self_working':
					$smarty->assign('subtitle','You\'re currently working on these');
					$smarty->assign('buglist_heading', 'Bugs being fixed by you');
					$smarty->assign('buglist',getMyWorkingBugList());
					break;
				case 'project':
					$smarty->assign('subtitle','Bugs related to project');
					$smarty->assign('buglist_heading', "Open Bugs for project #{$_GET['project_id']}");
					$smarty->assign('buglist',getProjectOpenBugs($_GET['project_id']));
					break;
			}
		}
		// hilighting is common to all
		if (isset($_GET['highlight'])){
				$smarty->assign('highlight',$_GET['highlight']);
		}
		break;
		
		case 'projects':
			if (!loggedIn()){ header("Location: $default_location"); }
			$template = 'projectlist.html';
			$smarty->assign('scripts', array('/static/scripts/project.js'));
			$smarty->assign('subtitle','Projects');
			$smarty->assign('projectlist_heading', 'All projects');
			$smarty->assign('projectlist',getProjectList());
			$smarty->assign('users', getUserNameList());
			$_SESSION['currentpage']='projects';
			break;
			
		case 'bug':
			if (!loggedIn()){ header("Location: $default_location"); }
			$template = 'bug.html';
			$_SESSION['currentpage']='';
			if (!isset($_GET['bug_id'])){
				$smarty->assign('buglist_heading', 'No Bug selected!');
			} else {
				$smarty->assign('scripts', array('/static/scripts/bugpage.js'));
				
				// Show a bug's history and allow adding a revision
				$smarty->assign('users', getUserNameList());
				$smarty->assign('bugdata', getBugData($_GET['bug_id']));
				$smarty->assign('bughistory', getBugHistory($_GET['bug_id']));
				
				// put in form data for select options
				$formdata = getNewFormData();
				foreach($formdata as $key=>$val){
					$smarty->assign($key, $val);
				}
			}
			break;
		
		case 'updateBug':
			// add a new bug history
			if (!loggedIn()){ header("Location: $default_location"); }
			addBugHistory();
			header ("Location: /index.php?page=bug&bug_id={$_POST['bug_id']}");
			break;
		
		case 'addProject':
			// add a new project
			if (!loggedIn()){ header("Location: $default_location"); }
			addNewProject();
			header ("Location: /index.php?page=projects");
			break;
		
		case 'admin':
			// admin page :D
			if (!loggedIn()){ header("Location: $default_location"); }
			if (!isAdmin()){ header("Location: $default_location"); }		// quitely let them wonder
			$template = 'admin.html';
			$_SESSION['currentpage']='admin';
			$smarty->assign('subtitle', 'Administration');
			$smarty->assign('users', getUserNameList());
			$formdata = getNewFormData();
			foreach($formdata as $key=>$val){
				$smarty->assign($key, $val);
			}
			break;
		
		case 'delStatus':
			if (!loggedIn()){ header("Location: $default_location"); }
			if (!isAdmin()){ header("Location: $default_location"); }		// quitely let them wonder
			delStatus($_GET['status']);
			header ("Location: /index.php?page=admin");
			break;
		
		case 'addStatus':
			if (!loggedIn()){ header("Location: $default_location"); }
			if (!isAdmin()){ header("Location: $default_location"); }		// quitely let them wonder
			addStatus();
			header ("Location: /index.php?page=admin");
			break;
		
		case 'delCat':
			if (!loggedIn()){ header("Location: $default_location"); }
			if (!isAdmin()){ header("Location: $default_location"); }		// quitely let them wonder
			delCat($_GET['cat']);
			header ("Location: /index.php?page=admin");
			break;
		
		case 'addCat':
			if (!loggedIn()){ header("Location: $default_location"); }
			if (!isAdmin()){ header("Location: $default_location"); }		// quitely let them wonder
			addCat();
			header ("Location: /index.php?page=admin");
			break;
			
		default:
			header("Location: /index.php?page=home");
}

session_to_smarty($smarty);							// move all session data to be available in views
$smarty->display('header.html');				// concatenate other common parts together
$smarty->display($template);
$smarty->display('footer.html');
?>
