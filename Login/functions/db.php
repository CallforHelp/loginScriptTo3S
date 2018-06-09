<?php 
$db_host = 'datenbankhost';
$db_name = 'datenbankname';
$db_user = 'user';
$db_password = 'passwort';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
?>