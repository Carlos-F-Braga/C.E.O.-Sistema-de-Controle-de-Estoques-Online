<?php
$servername = "127.0.0.1:3307"; //endereço do servidor de banco de dados
$username = "root"; //nome do usuario do banco de dados
$password = ""; //senha do banco de dados
$database = "dbceo"; //nome do banco de dados

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "<h2 style='color:red'>Connection failed: " . $e->getMessage() . "</h2>";
}
