<?php
$mysqli = new mysqli("localhost", "root", "", "livelanguage", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sql = "DELETE from words WHERE id=$id";


echo "Woord verwijderd<br>";
echo $id;

$mysqli->query($sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;