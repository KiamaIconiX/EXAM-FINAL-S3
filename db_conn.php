<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "test2";

try {
    $pdo = new PDO("mysql:host=$sname;dbname=$db_name", $uname, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>


