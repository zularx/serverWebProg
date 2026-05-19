<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "notebookDB";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Ошибка подключения");
}
?>