<?php
$servername = 'localhost';
$username   = '';
$password   = '';
$dbname     = '';
$charset    = 'utf8';

try {
  $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=$charset", $username, $password);
} catch (PDOException $e) {
  echo "Error!: " . $e->getMessage() . "<br/>";
}
?>