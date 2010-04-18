<?php
    $dbhost = "localhost";
    $dbuser = "pizzamenu";
    $dbpass = "12345";
    $dbname = "pizzamenu";
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db ($dbname);
?>