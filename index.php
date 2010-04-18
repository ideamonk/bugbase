<?php

include_once('includes/db.inc.php');			// DB connectivity
include_once('includes/helpers.inc.php');		// misc helpers

require 'libs/Smarty.class.php';				// templating engine
$smarty = new Smarty;

stop_sql_injection();							// sanitize request data

$template = 'login.html';						// let default page be login

$smarty->display('header.html');				// concatenate other common parts together
$smarty->display($template);
$smarty->display('footer.html');
?>
