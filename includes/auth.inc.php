<?php
session_start();
@header("Cache-control: private");

function resetSession(){
	// clears up any stored session data
	$_SESSION['user_id'] = NULL;
	$_SESSION['user_fullname'] = NULL;
	$_SESSION['user_name'] = NULL;
	$_SESSION['access'] = 'denied';
	$_SESSION['isadmin'] = '0';
}

function checkLogin(){
	resetSession();
	$_user = $_POST['username'];
	$_pass = md5($_POST['password']);
	
	$query = "SELECT * FROM users WHERE username = '$_user'
         AND password = '$_pass'";

	$result = mysql_query($query);

	if ($row = mysql_fetch_assoc($result)){
		// successful login
		$_SESSION['access'] = 'granted';
		// store some data in session to avoid redundant queries
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_name'] = $row['username'];
		$_SESSION['user_fullname'] = $row['name'];
		if ($row['is_admin'] == 1){
			$_SESSION['isadmin'] = '1';
		}
	}
}

function loggedIn(){
	// returns the boolean state if the user is logged in or not
	if (isset($_SESSION['access']))
		return ($_SESSION['access'] == 'granted');
	else
		return false;
}

function logout(){
	resetSession();
}

function isAdmin(){
	return ($_SESSION['isadmin'] == '1');
}
?>
