<?php 

include ('conexao.php');

if(!isset($_GET['h'])) {
    die('URL Inválida');
}

$hash = $mysqli->real_escape_string($_GET['h']);
$sql_url_query = "SELECT * FROM urls WHERE id = '$hash'";
$sql_url_query_exec = $mysqli->query($sql_url_query) or die($mysqli->error);

$row = $sql_url_query_exec->fetch_assoc();

if (!$row) {
    die('Url Inválida');
}

$mysqli->query("UPDATE urls SET views = views + 1 WHERE id = '$hash'") or die($mysqli->error);

header('Location: ' . $row['url']);