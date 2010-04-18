<?php 
  $dbhost = "localhost";
  $dbuser = "bugbase";
  $dbpass = "password";
  $dbname = "bugbase";

  $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
  mysql_select_db ($dbname);
?>
