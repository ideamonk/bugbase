<?php
require 'libs/Smarty.class.php';

$smarty = new Smarty;

$template = "login.tpl";

$smarty->display('header.tpl');
$smarty->display($template);
$smarty->display('footer.tpl');

?>
