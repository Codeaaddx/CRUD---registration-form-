<?php
$dsn = 'mysql:host=localhost;dbname=volunteer_db';
$username = 'root';
$db_password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $db_password, $options);
} catch(PDOException $e) {

}
?>