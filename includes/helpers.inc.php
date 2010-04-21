<?php

function stop_sql_injection(){
	//This stops SQL Injection in POST vars
	foreach ($_POST as $key => $value) {
		$_POST[$key] = mysql_real_escape_string($value);
	}

	//This stops SQL Injection in GET vars
	foreach ($_GET as $key => $value) {
		$_GET[$key] = mysql_real_escape_string($value);
	}
}

function session_to_smarty(&$smarty){
	// moves all session variables to smarty for availability in views
	foreach ($_SESSION as $key => $value) {
		$smarty->assign($key, $value);
	}
}

function getCurrentUid(){
	return $_SESSION['user_id'];
}
?>

