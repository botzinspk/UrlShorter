<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = "url_short";

$mysqli = new mysqli($host, $user, $password, $dbname);

if ($mysqli->connect_errno)
    die ("Falha na conexão: (" . $mysqli->connect_errno . ") " .$mysqli->connect_error); 

    ?>
