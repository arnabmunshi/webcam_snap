<?php

$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'test';

$dbcon = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname) or die("Could not connect to server");

$data_uri = $_POST['data_uri'];

$image = file_get_contents($data_uri);
$image_name = time().'.png';
$fp  = fopen(__DIR__."./images/".$image_name, 'w+');
fputs($fp, $image);
fclose($fp);
unset($image);


$sql = "INSERT INTO capture_snap (image) VALUES ('{$image_name}')";

if (mysqli_query($dbcon, $sql)) {
  echo 'Saved';
}

mysqli_close($dbcon);
