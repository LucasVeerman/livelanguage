<?php
$mysqli = new mysqli("localhost", "root", "", "webwinkel", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sql = "SELECT * FROM tblproduct WHERE id= " . $id;

//$result = $mysqli->query($sql);
//$result = convertResultToArray($result);
//
//$mysqli->query($sql);