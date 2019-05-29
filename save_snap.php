<?php

$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'test';

$dbcon = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname) or die("Could not connect to server");

$data_uri = $_POST['data_uri'];

$sql = "INSERT INTO capture_snap (image) VALUES ('{$data_uri}')";

if (mysqli_query($dbcon, $sql)) {
  echo 'Saved';
}

mysqli_close($dbcon);
