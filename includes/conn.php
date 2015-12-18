<?php

$hostname = 'localhost';
$username = 'root';
$password = '12345678';

$link = mysql_connect($hostname, $username, $password);

$db = mysql_select_db('blog', $link);

?>